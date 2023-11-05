<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;

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
}
