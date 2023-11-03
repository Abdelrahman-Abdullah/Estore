<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Cart extends Controller
{
    public function index()
    {
        return session()->get('cart');
    }
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $cart = session()->get('cart' , []);
        if (!isset($cart[$request->product_id])) {
            $cart[$request->product_id] = [
                'name' => $product->title,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'image' => $product->image,
            ];
            session()->put('cart', $cart);
        }
        else
        {
            $cart[$request->product_id]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
