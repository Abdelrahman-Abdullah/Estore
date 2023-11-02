<?php

namespace App\Services;

class WishlistService
{
    public function allProductsWithin()
    {
        $user = auth()->user();
        return $user->wishlist()->firstOr(function () use ($user) {
            return $user->wishlist()->create(['user_id' => $user->id]);
        })->products;
        // firstOr() method will return the first element in the wishlist or create a new wishlist for the user if it doesn't exist.
    }

    public function addToWishlist($product)
    {
        $user = auth()->user();
        $user->wishlist->products()->attach($product);
        return true;
    }

    public function removeFromWishlist($product)
    {
        return auth()->user()->wishlist->products()->detach($product);
    }
}
