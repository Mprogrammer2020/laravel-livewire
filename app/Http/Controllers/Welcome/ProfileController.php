<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;

class ProfileController extends Controller
{
    public function showaddress(){
        $userid = Auth::user()->id;
        $user = User::where('id',$userid)->get();
        return view('welcome.address',['users' => $user]);

    }

    public function saveaddress(Request $request){
        //dd($request->all());
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "birthdate"  =>  "required",
            "street" =>  "required",
            "house_number"  =>  "required",
            "zip_code" =>  "required",
            "city" => "required"
            
        ]);
        if($validator->fails()) {
            return redirect()->route('welcome.address')->withErrors($validator)->withInput();
        }
        $user=Auth::user();
        //dd($request->all());
        $user->name = $request->name;
        $user->birthdate = $request->birthdate;
        $user->street = $request->street;
        $user->house_number = $request->house_number;
        $user->zip_code = $request->zip_code;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->save();
        //dd($user);
        Session::flash('message', 'Your address has been updated!'); 
        return redirect()->route('welcome.address');

    }

    public function passwordform(){
        return view('welcome.password');
    }

    public function savepassword(Request $request){
            $validator  =   Validator::make($request->all(), [
                "password"  =>  "required|min:6",
                "new_password" => "required|min:6",
                "confirm_password" =>  "required|same:new_password",
            
            ]);
            //dd($validator);
            if($validator->fails()) {
                return redirect()->route('welcome.password')->withErrors($validator)->withInput();
            }
            else{
                $user = User::find(auth()->user()->id);
                $password = $user->password;
                if(Hash::check($request->password, $password)){
                     $user->password = Hash::make($request->new_password);
                     $user->save();
                    Session::flash('success', 'Password chnaged successfully!'); 
                    return redirect()->route('welcome.password');
            }
            else{
                Session::flash('error', 'Incorrect old password!'); 
                return redirect()->route('welcome.password');
            }
        }
    }


}
