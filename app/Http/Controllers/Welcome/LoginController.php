<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\CmsUserDashboard;
use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;
use Mail;

class LoginController extends Controller {

    public function loginPage() {
        if (Auth::check()) {
            return redirect(route('user.dashboard'));
        }
        $cms_user_dshboard = CmsUserDashboard::first();

        return view('welcome.signin')->with('cms_user_dshboard', $cms_user_dshboard);
    }

    public function register(Request $request) {
        if ($request->birthdate != null) {
            $date = explode('/', $request->birthdate);
            $formattedDate = (is_array($date) && count($date) >= 3) ? ($date[2] . '-' . $date[1] . '-' . $date[0]) : null;
            $nonFormattedDate = (is_array($date) && count($date) >= 3) ? ($date[0] . '/' . $date[1] . '/' . $date[2]) : null;
            $request->merge(['birthdate' => (is_array($date) && count($date) >= 3) ? ($date[2] . '-' . $date[1] . '-' . $date[0]) : null]);
        }
//         dd($request->all());
        $validator = Validator::make($request->all(), [
                    "name" => "required",
                    "email" => "required|email|unique:users",
                    "birthdate" => "required|before_or_equal:" . date('Y-m-d', strtotime('-21years')),
                    "password" => "required|min:6",
                    "confirmpassword" => "required|same:password",
                    "checkagree" => "required",
                        ],
                        ['birthdate.before_or_equal' => 'Minimum 21 years age required .']);
        if ($validator->fails()) {
            $request->merge(['birthdate' => $nonFormattedDate]);
            \Session::flash('_validate_error', 'yes');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $userExistByEmail = User::role('USER')->whereEmail($request->email)->first();
        if ($userExistByEmail) {
            \Session::flash('_validate_error', 'yes');
            return redirect()->back()->withErrors(['email' => 'Email is already been taken'])->withInput();
        }
        $hashids = new Hashids();
        $token = md5(Str::random(20) . time());
        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'birthdate' => $formattedDate,
                    'password' => Hash::make($request->password),
                    'referrer_id' => $request->tracking_id ? $hashids->decode($request->tracking_id)[0] : null,
                    'hash_token' => $token,
                    'active' => 1,
                    'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        $user->assignRole('USER');
        $user = $user->fresh();
        if ($user && $user->role_name == 'USER') {
            // Mail::send('email.verifyEmail', ['token' => $token, 'id' => $user->id, 'user' => $user], function ($message) use ($request) {
            //     $message->to($request->email);
            //     $message->subject('Verify Your Email');
            // });
//            Auth::login($user);
            \Session::flash('reg_success', 'yes');
            return redirect()->route('user.login');
        } else {
            Session::flash('message', 'Registration failed!');
            return redirect()->route('user.register');
        }
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $user = User::role('USER')->where('email', $request->email)->first();

        if ($user && $user->role_name == "USER" && Auth::attempt($credentials)) {
            if ($user->email_verified_at != null) {
                $request->session()->regenerate();
                \Session::flash('login_success', 'yes');
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return back()->with('verify_failed' , 'Your email is not verified. Please verify your email. <a href="javascript:;" onclick="openVerificationModal()">Click Here</a> to send the verification link again.');
            }
        }
        \Session::flash('_validate_error', 'yes');
        return back()->withErrors([
                    'message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function getRegister($trackingId = null) {
        $cms_user_dshboard = CmsUserDashboard::first();

        return view('welcome.signup')->with(['tracking_id' => $trackingId, 'cms_user_dshboard' => $cms_user_dshboard]);
    }

    public function signout() {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function forgotPassword() {
        $cms_user_dshboard = CmsUserDashboard::first();

        return view('welcome.forgot-password')->with('cms_user_dshboard', $cms_user_dshboard);
    }

}
