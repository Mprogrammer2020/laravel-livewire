<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }

    public function store(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "profile_photo_file" =>  "nullable|image|mimes:jpg,png,jpeg|max:5120",
            "street" => "required",
            "house_number" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "zip_code" => "required",
            "country" => "required"
        ], [
            "street.required" => "Street address is required",
            "house_number.required" => "house number is required",
            "address.required" => "Address is required",
            "city.required" => "City is required",
            "state.required" => "State is required",
            "country.required" => "Country is required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(), 'status' => false
            ]);
        } else {
            $user = User::find(auth()->id());
            if ($request->file('profile_photo_file')) {
                $fileName = time() . rand() . '.' . $request->profile_photo_file->extension();
                $path = $request->file('profile_photo_file')->storeAs(
                    'profile-photos',
                    $fileName,
                    'public'
                );
                $user->profile_photo_path = "profile-photos/{$fileName}";
            }
            $user->fill($request->all());
            $user->save();
            return response()->json([
                'message' => 'User profile has been updated successfully!!', 'status' => true
            ]);
        }
    }
}
