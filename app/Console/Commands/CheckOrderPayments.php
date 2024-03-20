<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Exception;
use \App\Service\AffiliateCommissionService;
use Illuminate\Http\Request;

class CheckOrderPayments extends Command {

    use AffiliateCommissionService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:orderPayments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for order payment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $getOrders = Order::where('is_completed', '0')
                        ->where('orders.created_at', '>', date('Y-m-d H:i:s', strtotime('-40 minutes')))->limit(10)->get();
        foreach ($getOrders as $order) {
            $request = new Request();
            try {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('PAYMENT_SERVER') . '/get-balance?public_address=' . $order->address,
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
//                $order = Order::where('id', $request->order_id)->first();
                $total_price = $order->total_amount;
                $balance = doubleval($balance) ?? null;
                if ($balance != null) {
                    if ($total_price <= $balance) {
//                        $order = Order::where('id', $request->order_id)->first();
                        $order->is_completed = 1;
                        $order->save();
                        $commissionPercent = 0;
                        //get commission percentage
                        $adminConfiguration = \App\Models\AdminConfiguration::where('key_name', 'commission_percentage')->first();
                        if ($adminConfiguration != null) {
                            $commissionPercent = $adminConfiguration->value;
                        }
                        //add affiliate commission
                        if ($order->userDetail->referrer != null && $order->commission_paid == 'NO') {
                            $commissionAmount = $order->total_amount * ($commissionPercent / 100);
                            $request->merge([
                                'user_id' => $order->userDetail->referrer->id,
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
                        echo '----------- payment succeeded for order - ' . $order->id . " ------------\n";
                    }
                }
            } catch (Exception $ex) {
                continue;
            }
        }
    }

}
