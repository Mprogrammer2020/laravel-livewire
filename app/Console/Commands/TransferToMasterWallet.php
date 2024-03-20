<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class TransferToMasterWallet extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transfer:masterWallet {id} {gas_price}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $id = $this->argument('id');
        $gasPrice = $this->argument('gas_price');
        echo $gasPrice;
        $order = Order::whereNull('transaction_hash')->where('id', $id)->first();
        if ($order != null) {
            $curl = curl_init();

            $post_data = [
                "public_address" => $order->address,
                "private_address" => $order->private_key,
                "gas_price" => $gasPrice
            ];
            $post_data = json_encode($post_data);
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('PAYMENT_SERVER') . '/send-money',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $post_data,
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                ),
            ));

            $response = curl_exec($curl);
//dd($response);
            curl_close($curl);
            $response = json_decode($response);
            if ($response != null && isset($response->result->hash) && $response->result->hash != null) {
                //save hash into the order
                $order->transaction_hash = $response->result->hash;
                $order->save();
            }
            echo 'updated at ' . date('Y-m-d H:i:s') . ' ' . time();
            dd($response);
        } else {
            echo 'Already Paid';
        }
    }

}
