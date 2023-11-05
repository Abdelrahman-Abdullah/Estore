<?php

namespace App\Http\Controllers;

use App\Services\StripeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function __construct(protected  StripeService $stripe)
    {
    }
    public function checkout()
    {
        Stripe::setApiKey(config('stripe.secret_key'));
        $session = Session::create([
            'line_items' => $this->stripe->prepareTheProducts()['products'],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.profile')->with('message', 'Your payment has been successfully accepted, Check Your orders');
    }
    public function cancel(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.profile')->with('error', 'Your payment has been canceled, Check Your orders');
    }
}
