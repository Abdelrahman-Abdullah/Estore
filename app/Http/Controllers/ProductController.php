<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use http\Encoding\Stream\Debrotli;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $product;
    public function __construct(ProductService $productService)
    {
        $this->product = $productService;
    }

    public function index()
    {
        return view('products.index', [
            'products' => $this->product->getAll()
        ]);
    }
}
