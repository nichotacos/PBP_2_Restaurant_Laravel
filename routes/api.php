<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionCartController;
use App\Models\Cart;
use App\Models\Transaction;
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
Route::post('user/login', [UserController::class, 'login']);
Route::put('user/forgotpw/{id}', [UserController::class, 'changePassword']);
Route::put('user/updateimage/{id}', [UserController::class, 'updateImage']);

Route::get('cart/findCart/{id}', [CartController::class, 'index2']);
Route::get('cart/getOnProgress/{id}', [CartController::class, 'getOnProgress']);
Route::get('cart/findAvail/{id}', [CartController::class, 'findAvail']);
Route::get('cart/find/{id}', [CartController::class, 'find']);
Route::put('cart/changeStatus/{id}', [CartController::class, 'changeStatus']);
Route::apiResource('cart', CartController::class);


Route::apiResource('items', ItemController::class);

Route::get('transactions/findTransaction/{id}', [TransactionController::class, 'findTransaction']);
Route::get('transactions/findLast', [TransactionController::class, 'findLast']);
Route::apiResource('transactions', TransactionController::class);

Route::apiResource('transactionsCart', TransactionCartController::class);


// Route::post('/user/login', 'App\Http\Controllers\Api\UserController@login');
