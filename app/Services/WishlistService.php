<?php

namespace App\Services;

class WishlistService
{
    public function allProductsWithin()
    {
        return auth()->user()->wishlist?->products ?? collect();
    }

    public function addToWishlist($product)
    {
        $authenticatable = auth()->user();
        if (!$authenticatable->wishlist) {
            $authenticatable->wishlist()->create([
                'user_id' => $authenticatable->id,
            ]);
        }
        $authenticatable->wishlist->products()->attach($product);
        return true;
    }

    public function removeFromWishlist($product)
    {
        return auth()->user()->wishlist->products()->detach($product);
    }
}
