<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterSubscribtion;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CategoryController::class, 'index'])->name('index');
Route::post('subscribe', NewsletterSubscribtion::class)->name('subscribe');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{title}', [ProductController::class, 'show'])->name('products.show');

#region User Routes
Route::prefix('users')
    ->as('user.')
    ->group(function () {
        Route::controller(UserRegisterController::class)
            ->group(function () {
                Route::get('register', 'create')->name('register');
                Route::post('register', 'store')->name('store');
            });
        Route::controller(UserAuthController::class)
            ->group(function () {
                Route::get('login', 'create')->name('login');
                Route::post('login', 'store')->name('login');
                Route::get('profile','show')->name('profile');
                Route::patch('profile','update')->name('updateProfile');
                Route::put('profile','update')->name('updateProfile');
                Route::post('logout', 'destroy')->name('logout');
            });
    });
#endregion
Route::controller(WishlistController::class)
    ->prefix('wishlist')
    ->as('wishlist.')
    ->middleware('auth')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/add', 'store')->name('store');
        Route::post('/remove', 'destroy')->name('destroy');
    });

Route::controller(ContactController::class)
    ->prefix('contact')
    ->as('contact.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/create', 'store')->name('store');
    });
