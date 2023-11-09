<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserRegisterController;
use App\Http\Controllers\API\UserAuthController;
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
    });

