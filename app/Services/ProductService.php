<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function getLatest()
    {
        return Product::latest()->take(5);
    }

}
