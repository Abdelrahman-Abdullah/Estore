<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
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

Route::get('/', [CategoryController::class, 'index']);
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{title}', [ProductController::class, 'show'])->name('products.show');

Route::controller(UserAuthController::class)
    ->prefix('users')
    ->as('user.')
    ->group(function () {
        Route::get('register', 'create')->name('register');
        Route::post('register', 'store')->name('store');
    });

Route::controller(ContactController::class)
    ->prefix('contact')
    ->as('contact.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/create', 'store')->name('store');
    });
