<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\CryptoPaymentReceived;
use App\Events\CreditCardPaymentReceived;
use App\Listeners\BuyPlantConfirmationByCryptoPayment;
use App\Listeners\BuyPlantConfirmationByCreditCardPayment;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CryptoPaymentReceived::class => [BuyPlantConfirmationByCryptoPayment::class],
        CreditCardPaymentReceived::class => [BuyPlantConfirmationByCreditCardPayment::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
