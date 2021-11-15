<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Mudar redirect do middleware para redirect com rota que retornar json informando que nao esta logado.
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/product', [ProductController::class, 'index']);
});

Route::get('/product', [ProductController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/store', [StoreController::class, 'store']);

Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/image/{store}', [StoreController::class, 'show_image']);
Route::get('/store/{store}', [StoreController::class, 'show']);
Route::put('/store/{store}', [StoreController::class, 'update']);
Route::delete('/store/{store}', [StoreController::class, 'destroy']);

Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/image/{product}', [ProductController::class, 'show_image']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);

Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{customer}', [CustomerController::class, 'show']);
Route::put('/customer/{customer}', [CustomerController::class, 'update']);
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy']);

Route::post('/address', [AddressController::class, 'store']);
Route::get('/address', [AddressController::class, 'index']);
Route::get('/address/{address}', [AddressController::class, 'show']);
Route::put('/address/{address}', [AddressController::class, 'update']);
Route::delete('/address/{address}', [AddressController::class, 'destroy']);

Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/{cart}', [CartController::class, 'show']);
Route::put('/cart/{cart}', [CartController::class, 'update']);
Route::delete('/cart/{cart}', [CartController::class, 'destroy']);

Route::post('/order', [OrderController::class, 'store']);
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{order}', [OrderController::class, 'show']);
Route::put('/order/{order}', [OrderController::class, 'update']);
Route::delete('/order/{order}', [OrderController::class, 'destroy']);
