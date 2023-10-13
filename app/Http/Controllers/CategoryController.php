<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $category;
    protected ProductService $product;
    public function __construct(
        CategoryService $category,
        ProductService $product
    )
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        return view('index' ,
            [
                'categories' => $this->category->getAll(),
                'latestProducts' => $this->product->latest(),
                'featuredProducts' => $this->product->featured(),
            ]
        );
    }
}
