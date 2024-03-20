<?php

namespace App\Listeners;

use App\Events\CreditCardPaymentReceived;
use App\Notifications\CreditCardPaymentReceived as CreditCardPaymentReceivedNotification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuyPlantConfirmationByCreditCardPayment
{

    public $selectedPlant;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreditCardPaymentReceived  $event
     * @return void
     */
    public function handle(CreditCardPaymentReceived $event)
    {
        $requestData = $event->request->all();
        $total_amount = $event->selectedPlant->price * $requestData['plant_want_to_buy'];
        if (!auth()->user()->plants->contains($event->selectedPlant->id))
            auth()->user()->plants()->syncWithoutDetaching([$event->selectedPlant->id => ['quantity' => $requestData['plant_want_to_buy'], 'total_amount' => $total_amount]]);
        else {
            $existinPlantpayment = auth()->user()->plants()->wherePivot('plant_id', $event->selectedPlant->id)->first();
            auth()->user()->plants()->updateExistingPivot($event->selectedPlant->id, ['quantity' => $existinPlantpayment->pivot->quantity + $requestData['plant_want_to_buy'], 'total_amount' => $existinPlantpayment->pivot->total_amount + $total_amount]);
        }

        $order = new Order();
        $order->quantity = $requestData['plant_want_to_buy'];
        $order->unit_price = $event->selectedPlant->price;
        $order->plant_id = $event->selectedPlant->id;
        auth()->user()->orders()->save($order);

        $userSuperAdmin = User::Role('SUPER-ADMIN')->first();
        if ($userSuperAdmin && $userSuperAdmin->affiliate_commission > 0 && auth()->user()->referrer()->exists()) {
            $commission = 0;
            $commission = ($total_amount * $userSuperAdmin->affiliate_commission) / 100;
            auth()->user()->referrer()->increment('commission_earned', $commission);
        }

        auth()->user()->notify(new CreditCardPaymentReceivedNotification($event->stripeRes));
    }
}
