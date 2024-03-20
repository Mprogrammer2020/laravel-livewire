<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Exception;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class OrderDetail extends Component {

    use WithPagination;

    public $orderId = '';
    public $remainingOrdersToTransfer;
    protected $paginationTheme = 'bootstrap';

    public function render() {
        $this->remainingOrdersToTransfer = Order::where('is_completed','1')->whereNull('transaction_hash')->count();
        return view('livewire.order-detail', [
                    'order_details' => Order::orderBy('id', 'DESC')->paginate(8),
                ])->layout('layouts.admin', ['title' => 'Order Details']);
    }

    /**
     * transfer to master wallet
     * @param Request $request
     * @return type
     */
    public function transferToMasterWallet(Request $request) {
        try {
            if ($request->gas_price != null && $request->gas_price != '') {
                $orders = Order::whereNull('transaction_hash')
                                ->where('is_completed', '1')->limit(50)->get();
                foreach ($orders as $order) {
                    @shell_exec('cd /var/www/html/gentlemencannabisphp && php artisan transfer:masterWallet ' . $order->id . ' ' . $request->gas_price . ' > /home/netset/gentlemenslogs/transfer' . $order->id . '.log 2>&1 &');
                }
                return response()->json(['type' => "success", 'msg' => "Transfers Queueued. It will take some onto credit to master wallet."], 200);
            } else {
                return response()->json(['type' => "failed", 'msg' => "Server Error. Please try again"], 400);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => "failed", 'msg' => "Server Error. Please try again"], 400);
        }
    }

    public function orderIds($id) {

        $order = Order::find($id);
        $public_address = $order->address;
        $private_address = $order->private_key;

        if (isset($public_address) && $public_address != '' && isset($private_address) && $public_address != '') {
            $curl = curl_init();

            $post_data = [
                "public_address" => $public_address,
                "private_address" => $private_address,
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

            curl_close($curl);
            dd(json_decode($response));
        }
    }

    /**
     * transfer the payment into master wallet
     * @param type $id
     */
    public function transferPayment($id) {



        try {

            $order = Order::find($id);
            $public_address = $order->address;
            $private_address = $order->private_key;

            if (isset($public_address) && $public_address != '' && isset($private_address) && $public_address != '') {
                $curl = curl_init();

                $post_data = [
                    "public_address" => $public_address,
                    "private_address" => $private_address,
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

                curl_close($curl);
                $response = json_decode($response);
                if ($response != null && isset($response->result->hash) && $response->result->hash != null) {
                    //save hash into the order
                    $order->transaction_hash = $response->result->hash;
                    $order->save();
                    $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "Successful"]);
                } else {
                    $this->dispatchBrowserEvent('toastr', ['type' => "error", 'msg' => "Something went wrong"]);
                }
            } else {
                $this->dispatchBrowserEvent('toastr', ['type' => "error", 'msg' => "Something went wrong"]);
            }
        } catch (Exception $ex) {
            $this->dispatchBrowserEvent('toastr', ['type' => "error", 'msg' => "Something went wrong"]);
        }
    }

}
