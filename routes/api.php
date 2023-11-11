<?php

use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserRegisterController;
use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::post('register', UserRegisterController::class)->name('register');
        Route::post('login', [UserRegisterController::class, 'login'])->name('login');
        Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');
    });

Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('{title}', [ProductController::class, 'show'])->name('show');
    });

Route::controller(WishlistController::class)
    ->prefix('wishlist')
    ->as('wishlist.')
    ->middleware('auth')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/add', 'store')->name('store');
        Route::post('/remove', 'destroy')->name('destroy');
    });

Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
