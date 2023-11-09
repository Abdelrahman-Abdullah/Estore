<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function all()
    {
        return Product::withAvg('reviews', 'rate')
            ->when(request('search'), fn($query) => $query->whereNameLike(request('search')))
            ->when(request()->query('sort'), fn($query) => $this->applySort($query))
            ->when(request()->has('min_price', 'max_price'), fn($query) => $this->applyPriceRange($query));
    }

    private function applySort($query)
    {
        $sort = request()->query('sort');
        return match ($sort) {
            'newest' => $query->whereNewest(),
            'popular' => $query->wherePopular(),
            default => $query
        };
    }

    private function applyPriceRange($query)
    {
        $minPrice = request('min_price');
        $maxPrice = request('max_price');
        return $query->wherePriceBetween($minPrice, $maxPrice);
    }

    public function latest()
    {
        return Product::latest()->take(5)->get();
    }

    public function getOne($title)
    {
        return Product::with('reviews')
            ->withAvg('reviews', 'rate')
            ->where('title', 'like', "%{$title}%")
            ->first();
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
