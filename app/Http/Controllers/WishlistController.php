<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(protected WishlistService $wishlist)
    {
    }

    public function index()
    {
        return view('wishlist', [
            'userWishlistProducts' => $this->wishlist->allProductsWithin()
        ]);
    }

    public function store()
    {
        $product = Product::where('title', request()->input('product_name'))->firstOrFail('id');
       return $this->wishlist->addToWishlist($product);
    }
    public function destroy()
    {
        $product = Product::where('title', request()->input('product_name'))->firstOrFail('id');
        return $this->wishlist->removeFromWishlist($product);
    }
}
