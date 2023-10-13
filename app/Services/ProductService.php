<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function latest()
    {
        return Product::latest()->take(5)->get();
    }

    public function featured()
    {
        return Product::has('reviews')
            ->withAvg('reviews', 'rate')->orderBy('reviews_avg_rate', 'desc')
            ->get()->filter(function ($product) {
                return $product->reviews_avg_rate >= 4;
            })->take(5);
    }

}
