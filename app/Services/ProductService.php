<?php

namespace App\Services;

use App\Models\product;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function Latest()
    {
        return Product::latest()->take(5);
    }

}
