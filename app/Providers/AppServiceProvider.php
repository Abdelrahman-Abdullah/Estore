<?php

namespace App\Providers;

use App\Services\CategoryService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['index', 'products.index', 'products.show'], function ($view) {
            $view->with('categories', (new CategoryService())->getAll() );
        });

        View::composer('*', function ($view) {
            $view->with('userWishlistProductsCount', auth()->user()?->wishlist?->products->count() ?? 0)
                 ->with('userCartProductsCount', session()->get('cart', []) ? count(session()->get('cart', [])) : 0);
        });

    }
}
