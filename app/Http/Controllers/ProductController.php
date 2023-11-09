<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
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
            'products' => $this->product->all()
                ->paginate(9)
                ->withQueryString()
        ]);
    }

    public function show($title)
    {
        $product = $this->product->getOne($title);
        return view('products.show', [
            'product' => $product,
            'latestProducts' => $this->product->latest()
        ]);
    }
}
