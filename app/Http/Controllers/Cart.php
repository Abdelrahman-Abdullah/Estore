<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Cart extends Controller
{

    public function __construct(protected CartService $cart)
    {
    }

    public function index()
    {
        return view('cart', ['cartProducts' => session()->get('cart', [])]);
    }

    public function store(Request $request)
    {
        $isAdded = $this->cart->addToCart($request);
        if (!$isAdded) {
            throw new NotFoundHttpException();
        }
        return back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $isDeleted = $this->cart->deleteFromCart($request);
        if (!$isDeleted) {
            throw new NotFoundHttpException();
        }
        return back()->with('success', 'Product Deleted From cart successfully!');
    }

}
