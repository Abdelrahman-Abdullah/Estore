<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\PaymentRequest;
use App\Services\OrderService;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class StripeController extends Controller
{
    public function __construct(protected StripeService $stripe, protected OrderService $order)
    {
    }
    public function checkout(PaymentRequest $request)
    {
        $cart = $request->cart;
        Stripe::setApiKey(config('stripe.secret_key'));
        $totalPrice = $this->stripe->fillTheProductsArray($cart)['totalPrice'];
        $session = Session::create([
            'line_items' => $this->stripe->fillTheProductsArray($cart)['products'],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
        $this->order->storeOrder($totalPrice, $session->id);
        redirect($session->url);
    }

    public function success()
    {
        return response()->json([
            'statusCode' => 200,
            'message' => 'Your payment has been successfully accepted, Check Your orders'
        ]);
    }

    public function cancel()
    {

    }
}
