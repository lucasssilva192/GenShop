<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADM\StoreController;
use App\Http\Controllers\ADM\ProductController;
use App\Http\Controllers\ADM\OrderController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/teste', function () {
    return view('teste');
});

Route::resource('/product', ProductController::class);
Route::resource('/order', OrderController::class);
Route::resource('/store', StoreController::class);