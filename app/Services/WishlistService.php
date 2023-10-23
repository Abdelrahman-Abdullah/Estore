<?php

namespace App\Services;

class WishlistService
{
    public function allProductsWithin()
    {
        return auth()->user()->wishlist->products;

    }

    public function addToWishlist($product)
    {
        auth()->user()->wishlist->products()->attach($product);
        return true;
    }

    public function removeFromWishlist($product)
    {
        return auth()->user()->wishlist->products()->detach($product);
    }
}
