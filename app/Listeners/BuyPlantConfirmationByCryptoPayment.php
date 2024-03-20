<?php

namespace App\Listeners;

use App\Events\CryptoPaymentReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuyPlantConfirmationByCryptoPayment
{
    public $selectedPlant;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  CryptoPaymentReceived  $event
     * @return void
     */
    public function handle(CryptoPaymentReceived $event)
    {
        if (!auth()->user()->plants->contains($this->selectedPlant->id))
            auth()->user()->plants()->syncWithoutDetaching([$this->selectedPlant->id => ['quantity' => session('pant_want_to_buy'), 'total_amount' => $this->selectedPlant->price * session('pant_want_to_buy')]]);
        else {
            $existinPlantpayment = auth()->user()->plants()->wherePivot('plant_id', $this->selectedPlant->id)->first();
            auth()->user()->plants()->updateExistingPivot($this->selectedPlant->id, ['quantity' => $existinPlantpayment->pivot->quantity + session('pant_want_to_buy'), 'total_amount' => $existinPlantpayment->pivot->total_amount + ($this->selectedPlant->price * session('pant_want_to_buy'))]);
        }
    }
}
