<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Order;

class AjaxController extends Controller
{
    /**
     * validate the transaction hash for the order and from eth payment server
     * @param Request $request
     * @return type 
     */
    public function validateTransactionHash(Request $request){
        try{
            $validator  =   Validator::make($request->all(), [
                "transaction_hash"  =>  "required",
            ]);
              //check for validation
            if ($validator->fails()) {
               return response()->json(['status'=>false,'message'=> $validator->errors()->first(),'data'=>[]],400);      
            }
              //check the hash on the payment server
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, env('PAYMENT_SERVER').'/transaction_details?transaction_hash='.$request->transaction_hash);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);
            if($resp != null && $resp != ""){
                $result = json_decode($resp);
                if(isset($result->result->address) && $result->result->address != null && $result->result->address != "" && isset($result->result->value)){
                    //check order by address
                    $orderByAddress = Order::where('address',$result->result->address)->first();
                    if($orderByAddress != null){
                        //check for payment in order detail
                         if($orderByAddress->is_completed != '1' && $result->result->value >= $orderByAddress->total_amount){
                             $orderByAddress->is_completed = '1';
                             $orderByAddress->save();
                         }
                        if($orderByAddress->plant != null){
                            $orderByAddress->plant;
                        }
                        if($result->result->value >= $orderByAddress->total_amount){
                            $orderByAddress->pending_amount = 0;
                        }else{
                            $orderByAddress->pending_amount = (($orderByAddress->total_amount * pow(10,18)) - ($result->result->value * pow(10,18)))/pow(10,18);
                        }
                        return response()->json(['status' => true,'message' => 'Successful','data' => $orderByAddress]);
                    }
                }
            }
            return response()->json(['status'=>false,'message'=>'Record not found','data'=>[]],400);
        }catch(Exception $e){
            return response()->json(['status'=>false,'message'=>'Server Error','data'=>[]],400);
        }
    }
}
