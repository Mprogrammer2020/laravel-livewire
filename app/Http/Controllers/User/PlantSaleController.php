<?php

namespace App\Http\Controllers\User;

use App\Events\CreditCardPaymentReceived;
use App\Events\CryptoPaymentReceived;
use App\Helpers\StripeServiceHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plant;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \App\Service\AffiliateCommissionService;
use App\Models\Announcement;

class PlantSaleController extends Controller {

    use AffiliateCommissionService;

    public function index($plant_id = null) {
        $allPlants = Plant::latest()->first();
        $announcements = Announcement::where('status','ACTIVE')->pluck('description');
        if ($plant_id) {
            $selectedPlant = Plant::find($plant_id);
        } else {
            $selectedPlant = Plant::latest()->first();
        }
        if ($allPlants != null) {
            //get the order quantities for the plant and calculate available quantity
            $orderedQuantity = $allPlants->orders()->where(function ($query) {
                        $query->whereNull('expired_at')->orWhere('expired_at', '>', date('Y-m-d H:i:s'))->orWhere('is_completed', '1');
                    })->sum('quantity');
            if ($orderedQuantity > 0) {
                $allPlants->available_quantity = $allPlants->quantity - $orderedQuantity;
            } else {
                $allPlants->available_quantity = $allPlants->quantity;
            }
            $allPlants->ownerCount = $allPlants->orders->groupBy('user_id')->count();
        }

        session(['selected_plant' => $selectedPlant]);
        session(['pant_want_to_buy' => 1]);
        $selectedPlant = $selectedPlant ?? array();

        return view('user.plant-sale', compact('allPlants', 'selectedPlant','announcements'));
    }

    public function planBuy($id) {

        // date_default_timezone_set('America/Los_Angeles');
        // $date_30min = date('Y-m-d H-i-s');
        // $order_details = Order::with('plant')->where('user_id', auth()->user()->id)->where('expired_at', '>', $date_30min)->paginate(8);

        $plant = Plant::where('id', $id)->first();
        //get the order quantities for the plant and calculate available quantity
        $orderedQuantity = $plant->orders()->where(function ($query) {
                    $query->whereNull('expired_at')->orWhere('expired_at', '>', date('Y-m-d H:i:s'))->orWhere('is_completed', '1');
                })->sum('quantity');
        if ($orderedQuantity > 0) {
            $plant->available_quantity = $plant->quantity - $orderedQuantity;
        } else {
            $plant->available_quantity = $plant->quantity;
        }

        return view('user.plant-buy', compact('plant'));
    }

    public function planPurchase($id) {
        $order_detail = Order::with('plant')->where('order_number', $id)->first();
        return view('user.plant-purchase', compact('order_detail'));
    }

    public function orderDetail() {
        date_default_timezone_set('America/Los_Angeles');
        $date_30min = date('Y-m-d H-i-s');
        $order_details = Order::with('plant')->where('user_id', auth()->user()->id)
                        ->where(function ($query) use ($date_30min) {
                            $query->where('expired_at', '>', $date_30min)
                            ->orWhere('orders.is_completed', '1');
                        })->orderBy('orders.created_at', 'DESC')->paginate(8);

        return view('user.order-detail', compact('order_details'));
    }

    public function setSessionPlantWantToBuy(Request $request) {
        $request->session()->put('pant_want_to_buy', $request->plant_want_to_buy);

        return response()->json([
                    'message' => 'Success', 'status' => true, 'data' => $request->session()->all(),
        ]);
    }

    public function cryptoPaymentReceived() {
        if (session('pant_want_to_buy')) {
            CryptoPaymentReceived::dispatch();
        }

        Log::info('webhook cryptoPaymentReceived');

        return response()->json([
                    'message' => 'It worke!  Crypto payment has been received', 'status' => true,
        ]);
    }

    public function creditCardPaymentReceived(Request $request) {
        if (!auth()->user()->isShippingAddressAvailable()) {
            return response()->json([
                        'message' => 'No shipping address found in your account.Please complete your shipping address first.', 'status' => false,
            ]);
        }

        if ($request->stripeToken) {
            \DB::transaction(function () use ($request) {
                $stripeServiceHelperObj = new StripeServiceHelper;
                $stripeRes = $stripeServiceHelperObj->charge([
                    'amount' => $request->total_amount * $stripeServiceHelperObj->currencyMultiplyingFactor,
                    'currency' => 'usd',
                    'source' => $request->stripeToken,
                    'statement_descriptor' => 'Market Maker Solutions',
                    'description' => "A new payment of $" . $request->total_amount . " has been received successfully",
                ]);
                // dd($stripeRes['payment_method_details']['card']['brand']);
                CreditCardPaymentReceived::dispatch($request, $stripeRes);
                // Session::flash('success', "You have registered successfully");
                // $userObj->notify(new PaymentReceived($userObj));
                // $modifiedUser = $userObj->replicate();
                // $modifiedUser->email = env('MAIL_FROM_ADDRESS');
                // $modifiedUser->notify(new StudentRegistration($userObj));
            });
        }

        return response()->json([
                    'message' => 'We have received your payment.Thank you for your purchase.', 'status' => true,
        ]);
    }

    public function createWallet(Request $request) {

        $address = Order::where('order_number', $request->order_id)->pluck('address')->first();

        if (isset($address)) {
            return response()->json(['status' => true, 'data' => $address], 200);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('PAYMENT_SERVER') . '/create-wallet',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api-eu1.tatum.io/v3/offchain/account/622a0564719118af15406e36/address',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json',
        //         'x-api-key: 08fd5185-6055-4f14-ab3b-6783817eaea5',
        //     ),
        // ));

        $response = curl_exec($curl);
        $address = json_decode($response);

        curl_close($curl);

        $order = Order::where('order_number', $request->order_id)->first();
        $order->address = $address->address;
        $order->private_key = $address->xpub;
        $order->save();

        return response()->json(['status' => true, 'data' => $address->address], 200);
    }

    public function getBalance(Request $request) {

        try {

            $curl = curl_init();

//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://api-eu1.tatum.io/v3/ethereum/account/balance/' . $request->address_id,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'GET',
//            CURLOPT_HTTPHEADER => array(
//                'x-api-key: 08fd5185-6055-4f14-ab3b-6783817eaea5',
//                'x-testnet-type: ethereum-ropsten',
//            ),
//        ));
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('PAYMENT_SERVER') . '/get-balance?public_address=' . $request->address_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $balance = json_decode($response);

            $balance = doubleval($balance->balance) ?? null;
            $order = Order::where('id', $request->order_id)->first();
            $total_price = $order->total_amount;
            $balance = doubleval($balance) ?? null;
            // dd($request->order_id);
            if ($balance != null) {
                if ($total_price <= $balance) {
                    $order = Order::where('id', $request->order_id)->first();
                    $order->is_completed = 1;
                    $order->save();
                    $commissionPercent = 0;
                    //get commission percentage
                    $adminConfiguration = \App\Models\AdminConfiguration::where('key_name', 'commission_percentage')->first();
                    if ($adminConfiguration != null) {
                        $commissionPercent = $adminConfiguration->value;
                    }
                    //add affiliate commission
                    if (auth()->user()->referrer != null && $order->commission_paid == 'NO') {
                        $commissionAmount = $order->total_amount * ($commissionPercent / 100);
                        $request->merge([
                            'user_id' => auth()->user()->referrer->id,
                            'order_id' => $order->id,
                            'commission_amount' => $commissionAmount
                        ]);
                        if ($this->saveAffiliateCommission($request)) {
                            //update the commission for the order
                            $order->commission_amount = $commissionAmount;
                            $order->commission_paid = 'YES';
                            $order->save();
                        }
                    }
                }
                // self::fundTransfer($order);
                return response()->json(['status' => true, 'data' => json_decode($response), 'total' => $total_price, 'balance' => $balance], 200);
            }
            return response()->json(['status' => false, 'data' => []], 400);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'data' => []], 400);
        }
    }

    public function createOrder(Request $request) {
        date_default_timezone_set('America/Los_Angeles');

        $minutes_to_add = 30;

        $date = Carbon::now();
        $time = new DateTime($date);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        $stamp = $time->format('Y-m-d H:i');
        $price = Plant::where('id', $request->plant_id)->first();
        //check for available quantity for that plan
        $orderedQuantity = $price->orders()->where(function ($query) {
                    $query->whereNull('expired_at')->orWhere('expired_at', '>', date('Y-m-d H:i:s'))->orWhere('is_completed', '1');
                })->sum('quantity');
        if ($orderedQuantity > 0) {
            $available_quantity = $price->quantity - $orderedQuantity;
        } else {
            $available_quantity = $price->quantity;
        }
        if ($available_quantity < $request->quantity) {
            return response()->json(['status' => false, 'message' => 'Selected quantity not available', 'data' => []], 400);
        }
        $price = $request->currency == 'BTC' ? $price->price : $price->eth_price;
        $today = time();
        $rand = sprintf("%04d", rand(0, 9999));
        $order_number = $today . $rand;
        $order = Order::create(['order_number' => $order_number, 'currency' => $request->currency, 'quantity' => $request->quantity, 'plant_id' => $request->plant_id, 'user_id' => auth()->user()->id, 'unit_price' => $price, 'total_amount' => $price * $request->quantity, 'expired_at' => $stamp]);
        return response()->json(['status' => true, 'data' => route('user.plant.purchase', $order->order_number)], 200);
    }

}
