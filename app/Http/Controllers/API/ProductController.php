<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $product)
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'statusCode' => 200,
            'products' => ProductResource::collection($this->product->getAll())
        ]);
    }
}
