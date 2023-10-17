<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class ProductBuilder extends Builder
{
    public function whereNameLike($name): self
    {
        return $this->where('title', 'like', "%$name%");
    }
    public function whereNewest(): self
    {
        return $this->orderBy('created_at', 'desc');
    }
    public function wherePopular(): self
    {
        return $this->withAvg('reviews', 'rate')
            ->orderBy('reviews_avg_rate', 'desc');
    }
    public function wherePriceBetween(float $min, float $max): self
    {
        return $this->whereBetween('price', [$min, $max]);
    }
}
