<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getAll()
    {
        return Product::withAvg('reviews', 'rate')
            ->when(request('search'), fn($query) => $query->whereNameLike(request('search')))
            ->when(request()->query('sort') == 'newest', fn($query) => $query->whereNewest())
            ->when(request()->query('sort') == 'popular', fn($query) => $query->wherePopular())
            ->when(request()->has('min_price','max_price'), function ($query) {
                $minPrice = request('min_price');
                $maxPrice = request('max_price');
                return $query->wherePriceBetween($minPrice, $maxPrice);
            })
            ->paginate(9)
            ->withQueryString();
    }

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
