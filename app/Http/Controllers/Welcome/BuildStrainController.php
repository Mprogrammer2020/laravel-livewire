<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrainBase;
use App\Models\DesiredEffect;
use App\Models\User;
use App\Models\Page;

use Validator;

class BuildStrainController extends Controller
{
    public function getBuildStrain(){
        $page=Page::whereName('BUILD-MY-STRAIN')->first();
        return view('welcome.build-strain',compact('page'));
    }

    public function getStrainBasesAndEffects(){
        return response()->json(
            [
            'success'=>true, 
            'strainBases'=>StrainBase::latest()->get(),
            'effects'=>DesiredEffect::latest()->get()
            ]);
    }
    public function getStrainOptionsByEffects(Request $request){
        $tempArrayOfStrainOption = [];
        foreach ($request->effects as $key => $selectedEffect) {
            $desiredEffectObj=DesiredEffect::find($selectedEffect['id']);
            foreach($desiredEffectObj->strainOptions as $strainOption)
            array_push($tempArrayOfStrainOption,$strainOption);
        }
        return response()->json(
            [
            'success'=>true, 
            'data'=>$tempArrayOfStrainOption
            ]);
        // dd($this->strainOptions[0]['image']);
       
     }
     public function saveLead(Request $request){
        $validator = Validator::make($request->user,[
            'email' => 'bail|required',  //|unique:user
            'name' => 'bail|required',
            'phone' => 'bail|required',
            'business_name' => 'bail|required'
            ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=>false,
                'message' => $validator->errors()->all()[0]
                ]);
        }
            $user=new User($request->user);
            $user->strain_base_id=$request->strainBase['id'];
            $user->strain_option_id=$request->strainOption['id'];
            $user->save();
            $user->assignRole('CLIENT');
            $user->desiredEffects()->sync($request->effects);
        
        return response()->json(
            [
            'status'=>true,
            ]);
        // dd($this->strainOptions[0]['image']);
       
     }
}
