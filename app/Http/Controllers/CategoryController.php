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
        ProductService $productService
    )
    {
        $this->category = $category;
    }
    public function index()
    {
        return view('index' ,
            [
                'categories' => $this->category->getAll(),
                'latestProducts' => $this->product->getLatest(),
            ]
        );
    }
}
