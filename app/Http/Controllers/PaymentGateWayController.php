<?php

namespace App\Http\Controllers;

use BitPaySDK\Model\Currency;
use Illuminate\Support\Facades\Redirect;
use Vrajroham\LaravelBitpay\LaravelBitpay;

class PaymentGateWayController extends Controller
{
    public function index()
    {
        // Create instance of Invoice
$invoice = LaravelBitpay::Invoice(0.001, Currency::ETH); // Always use the BitPay Currency model to prevent typos


// Set item details (Only 1 item per Invoice)
        $invoice->setItemDesc('You "Joe Goldberg" Life-Size Wax Figure');
        $invoice->setItemCode('sku-1234');
        $invoice->setPhysical(false); // Set to false for digital/virtual items

// Ensure you provide a unique OrderId for each Invoice
        $invoice->setOrderId('eretrtre');

// Create Buyer Instance
        $buyer = LaravelBitpay::Buyer();
        $buyer->setName('John Doe');
        $buyer->setEmail('john.doe@example.com');
        $buyer->setAddress1('2630 Hegal Place');
        $buyer->setAddress2('Apt 42');
        $buyer->setLocality('Alexandria');
        $buyer->setRegion('VA');
        $buyer->setPostalCode(23242);
        $buyer->setCountry('US');
        $buyer->setNotify(true); // Instructs BitPay to email Buyer about their Invoice

// Attach Buyer to Invoice
        $invoice->setBuyer($buyer);

// Set URL that Buyer will be redirected to after completing the payment, via GET Request
        $invoice->setRedirectURL(route('success.payment'));
// Set URL that Buyer will be redirected to after closing the invoice or after the invoice expires, via GET Request
        $invoice->setCloseURL(route('cancel.payment'));
$invoice->setAutoRedirect(false);


// Optional. Learn more at: https://github.com/vrajroham/laravel-bitpay#1-setup-your-webhook-route
        $invoice->setNotificationUrl('https://example.com/your-custom-webhook-url');

// This is the recommended IPN format that BitPay advises for all new implementations
        $invoice->setExtendedNotifications(true);


// Create invoice on BitPay's server
        $invoice = LaravelBitpay::createInvoice($invoice);

        $invoiceId = $invoice->getId();
        $invoiceToken = $invoice->getToken();

// $invoice = LaravelBitpay::getInvoice($invoiceId);


// dd($invoice);


// You should save Invoice ID and Token, for your reference
        // $order->update(['invoice_id' => $invoiceId, 'invoice_token' => $invoiceToken]);

// Redirect user to the Invoice's hosted URL to complete payment
        $paymentUrl = $invoice->getUrl();


        return Redirect::to($paymentUrl);

    }
}
