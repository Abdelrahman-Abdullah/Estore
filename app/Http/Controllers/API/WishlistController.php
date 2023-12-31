<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Models\Product;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(protected WishlistService $wishlist){}
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'statusCode' => 200,
            'userWishlistProducts' => WishlistResource::collection($this->wishlist->allProductsWithin())
        ]);
    }

    public function store()
    {
        $product = Product::where('title', 'like', '%'.request()->input('product_name').'%')->firstOrFail('id');
        $isAdded =  $this->wishlist->addToWishlist($product);
        $isAdded ? $message = 'Product added to wishlist' : $message = 'Product already in wishlist';
        return response()->json([
            'message' => $message,
            'statusCode' => 201,
        ],201);
    }
    public function destroy()
    {
        $product = Product::where('title', 'like', '%'.request()->input('product_name').'%')->firstOrFail('id');
        $isRemoved =  $this->wishlist->removeFromWishlist($product);
        $isRemoved ? $message = 'Product removed from wishlist' : $message = 'Product not in wishlist';
        return response()->json([
            'message' => $message,
            'statusCode' => 200,
        ]);
    }
}
