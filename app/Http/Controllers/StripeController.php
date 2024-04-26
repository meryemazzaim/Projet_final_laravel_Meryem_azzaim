<?php

namespace App\Http\Controllers;

use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function session(Request $request)
    {

        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            "name" => "LionsGeek Product",
                            "description" => "nyehehehehe"
                        ],
                        'unit_amount'  => 10000,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment', // the mode  of payment
            'success_url' => route('session'), // route when success d
            'cancel_url'  => route('dashboard'), // route when  failed or canceled
        ]);

        return redirect()->away($session->url);
    }
    public function paymentSuccess()
    {
        // Logic after successful payment
        return view('dashboard'); // Return a view or another type of response
    }

    public function dashboard()
    {
        // Logic when payment is canceled or fails
        return redirect('/dashboard'); // Redirect to a dashboard or another page
    }
}
