<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use function PHPUnit\Framework\isEmpty;

class CartService
{
    private function createCartItem($product, $quantity): array
    {
        return [
            'id' => $product->id,
            'name' => $product->title,
            'quantity' => $quantity ,
            'price' => $product->price,
            'totalPrice' => $product->price * $quantity,
            'image' => $product->image,
        ];
    }

    public function addToCart($request): bool
    {
        try {
            $product = Product::find($request->product_id);
            $cart = session()->get('cart', []);

            if (!isset($cart[$request->product_id])) {
                $cart[$request->product_id] = $this->createCartItem($product, $request->quantity ?? 1);
            } else {
                $cart[$request->product_id]['quantity'] += $request->quantity;
            }

            session()->put('cart', $cart);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteFromCart($request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart) || !isset($cart[$request->product_id])) {
            return false;
        }
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);
        return true;
    }
}
