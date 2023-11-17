<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\EphemeralKey;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeService
{
    public function prepareTheProducts(): array|RedirectResponse
    {
        if (!session()->get('cart')) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }
        $cart = session()->get('cart');
        $prepared = $this->fillTheProductsArray($cart);
        return [
            'products' => $prepared['products'],
            'totalPrice' => $prepared['totalPrice'],
        ];
    }

    public function fillTheProductsArray($cart): array
    {
        $products = [];
        $totalPrice = 0;
        foreach ($cart as $productInCart) {
            $totalPrice += $productInCart['price'] * $productInCart['quantity'];
            $products[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $productInCart['price'] * 100,
                    'product_data' => [
                        'name' => $productInCart['name'],
                    ],
                ],
                'quantity' => $productInCart['quantity'],
            ];
        }
        return [
            'products' => $products,
            'totalPrice' => $totalPrice,
        ];
    }

    public function checkIfTheSessionIsCorrect($sessionId): bool
    {
        Stripe::setApiKey(config('stripe.secret_key'));
        $isThereSession = Session::retrieve($sessionId);
        if (!$isThereSession) {
            return false;
        }
        return true;
    }

    public function isThereCustomerOrCreate()
    {
        $currentUserEmail = auth()->user()->email;
        $existingCustomer = Customer::all([
            'email' => $currentUserEmail,
            'limit' => 1,
        ]);
        if (count($existingCustomer->data) > 0) {
            return $existingCustomer->data[0]->id;
        }
        $newCustomer = Customer::create([
            'email' => $currentUserEmail,
        ]);
        return $newCustomer->data->id;
    }

    public function createEphemeralKey($customerId): EphemeralKey
    {
        return EphemeralKey::create(
            ['customer' => $customerId],
            ['stripe_version' => '2020-08-27']
        );
    }

    public function createPaymentIntent($amount, $customerId): PaymentIntent
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => 100 * $amount,
            'currency' => 'usd',
            'customer' => $customerId,
        ]);
        return $paymentIntent;
    }
}
