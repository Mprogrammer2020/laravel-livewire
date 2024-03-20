<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Validator;
use Mail;

class VerificationController extends Controller {

    /**
     * verify the email
     * @param type $token
     * @return type
     */
    public function verifyEmail($token, Request $request) {
        try {
            $id = base64_decode($request->get('_un'));
            $user = User::where('hash_token', $token)->where('id', $id)->first();
            if ($user != null) {
                //update the user
                $user->hash_token = md5(Str::random(24) . time());
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                \Session::flash('verification_success', 'Your email is verified successfully.');
            } else {
                \Session::flash('verification_error', 'Could not verify your email. Either email is already verified or the verification link expired.');
            }
        } catch (Exception $ex) {
            \Session::flash('verification_error', 'Could not verify your email. Either email is already verified or the verification link expired.');
        }
        return redirect(route('user.login'));
    }

    /**
     * send verification email to user email
     * @param Request $request
     * @return type
     */
    public function sendVerificationEmail(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                        "email" => "required|email",
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
            }
            $user = User::where('email', $request->email)->first();
            if ($user != null && $user->role_name == 'USER') {
                $token = md5(Str::random(24) . time());
                $user->hash_token = $token;
                $user->save();
                Mail::send('email.verifyEmail', ['token' => $token, 'id' => $user->id, 'user' => $user], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Verify Your Email');
                });
                return response()->json(['success' => true, 'message' => 'Verifcation email sent successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Email does not exists!!!'], 422);
            }
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => 'Server error'], 422);
        }
        return response()->json(['success' => false, 'message' => 'Server error'], 422);
    }

}
