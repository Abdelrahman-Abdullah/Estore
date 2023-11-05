<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\StripeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function __construct(protected StripeService $stripe, protected OrderService $order)
    {
    }

    public function checkout()
    {
        Stripe::setApiKey(config('stripe.secret_key'));
        $totalPrice = $this->stripe->prepareTheProducts()['totalPrice'];
        $session = Session::create([
            'line_items' => $this->stripe->prepareTheProducts()['products'],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel') . "?session_id={CHECKOUT_SESSION_ID}",
        ]);
        $this->order->storeOrder($totalPrice, $session->id);
        return redirect($session->url);
    }

    public function success(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sessionId = request()->get('session_id');
        $isThereASession = $this->stripe->checkIfTheSessionIsCorrect($sessionId);
        if (!$isThereASession) {
            throw new NotFoundHttpException;
        }
        $this->order->updateOrder($sessionId);
        session()->flash('success', 'Your payment has been successfully accepted, Check Your orders');
        return view('users.profile');
    }

    public function cancel(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        session()->flash('error', 'Your payment has been canceled, Check Your orders');
        return view('users.profile');
    }
}
