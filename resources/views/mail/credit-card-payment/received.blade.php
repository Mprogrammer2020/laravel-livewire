@component('mail::message')
# Hi {{$user->name}},

We have received your payment.

@component('mail::table')
| AMOUNT PAID   | DATE PAID     | PAYMENT METHOD|
|:------------- |:-------------|:--------|
| ${{$stripedata['amount']/100}} | {{now()->format('Y-m-d')}}| {{$stripedata['payment_method_details']['card']['brand']}} - {{$stripedata['payment_method_details']['card']['last4']}}    |
@endcomponent


##### SUMMARY
@component('mail::panel')
Thank you for purchasing and making the payment.
@endcomponent
@component('mail::panel')
<b>Amount Paid  &nbsp; ${{$stripedata['amount']/100}}</b>
{{-- <b>Amount Paid  &nbsp; $300</b> --}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent