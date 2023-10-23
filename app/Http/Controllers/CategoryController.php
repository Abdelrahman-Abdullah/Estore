<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $category;
    protected ProductService $product;
    public function __construct(
        CategoryService $category,
        ProductService $product,
        WishlistService $wishlist
    )
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        return view('index' ,
            [
                'latestProducts' => $this->product->latest(),
                'featuredProducts' => $this->product->featured(),
            ]
        );
    }
}
