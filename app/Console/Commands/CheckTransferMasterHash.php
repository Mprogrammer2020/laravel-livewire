<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Exception;

class CheckTransferMasterHash extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkHash:masterTransfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the transfer status for the master wallet';

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
        try {

            $ordersRawObj = Order::where('orders.transaction_hash_check', 'NO')
                            ->whereNotNull('orders.transaction_hash')->limit(25);
            $orderIds = $ordersRawObj->pluck('id');
            $orders = $ordersRawObj->get();
            if (!$orders->isEmpty()) {
                echo "---- updating status to in-progress -------\n";
            Order::whereIn('id', $orderIds)->update(['transaction_hash_check' => 'IN-PROGRESS']);
                echo "----- update all orders into in progress ------\n";
                foreach ($orders as $key => $order) {
                    try {
                        if ($order != null) {
                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                                CURLOPT_URL => env('PAYMENT_SERVER') . '/check_pending_transaction?transaction_hash=' . $order->transaction_hash,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                            ));
                            $response = curl_exec($curl);
                            $status = json_decode($response);
                            if (isset($status->result->success) && $status->result->success == true) {
                                $order->transaction_hash_check = 'YES';
                                $order->save();
                                echo 'Hash validated successfully for order - ' . $order->id . "\n";
                            } else {
                                $order->transaction_hash_check = 'NO';
                                $order->transaction_hash = NULL;
                                $order->save();
                                echo 'Wrong Hash or payment not confirmed for order - ' . $order->id . ". Hash has been removed and need to transfer to master wallet again\n";
                            }
                        }
                    } catch (Exception $ex) {
                        echo 'Error checking the hash for order - ' . $order->id . "\n";
                        continue;
                    }
                }
            }else{
                echo 'No records for the ';
            }
        } catch (Exception $ex) {
            echo '---error message ---- ' . $e->getMessage();
        }
    }

}
