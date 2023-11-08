<?php

use App\Http\Controllers\API\UserRegisterController as APIUserRegisterController;
use App\Http\Controllers\API\UserAuthController as APIUserAuthController;
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
        Route::post('register', APIUserRegisterController::class)->name('register');
        Route::post('login', [APIUserAuthController::class, 'login'])->name('login');
        Route::post('logout', [APIUserAuthController::class, 'logout'])->name('logout');
    });

