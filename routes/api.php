<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Models\Cart;
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

Route::apiResource('user', UserController::class);
Route::post('/user/login', [UserController::class, 'login']);

Route::apiResource('cart', CartController::class);
