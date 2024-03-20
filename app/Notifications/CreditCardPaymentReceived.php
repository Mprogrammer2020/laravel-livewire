<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreditCardPaymentReceived extends Notification
{
    use Queueable;
    public $stripeRes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($stripeRes)
    {
        $this->stripeRes = $stripeRes;
        // dd($this->stripeRes);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($this->stripeRes['amount']);
        return (new MailMessage)->markdown('mail.credit-card-payment.received', ['user' => auth()->user(), 'stripedata' => $this->stripeRes])->subject('Payment Acknowledgement');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
