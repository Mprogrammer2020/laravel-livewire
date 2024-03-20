<?php

namespace App\Events;

use App\Models\Plant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreditCardPaymentReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $stripeRes;
    public $selectedPlant;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request, $stripeRes)
    {
        $this->request = $request;
        $this->stripeRes = $stripeRes;
        $this->selectedPlant = Plant::findOrFail($this->request->selectedPlantId);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
