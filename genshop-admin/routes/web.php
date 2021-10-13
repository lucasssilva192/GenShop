<?php

use App\Http\Controllers\ADM\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADM\StoreController;
use App\Http\Controllers\ADM\ProductController;
use App\Http\Controllers\ADM\OrderController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/product', ProductController::class);
    Route::resource('/order', OrderController::class);
    Route::resource('/store', StoreController::class);
    Route::resource('/category', CategoryController::class);
});

require __DIR__.'/auth.php';
