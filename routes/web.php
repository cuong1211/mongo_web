<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
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
    return view('pages.main');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('pages.main');
    })->name('admin');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('pages.frontend.index');
});
route::get('/product', function () {
    return view('pages.frontend.product');
})->name('frontend.product');
route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index'])->name('cart.index');
route::get('checkout',[App\Http\Controllers\Frontend\CartController::class,'getCheckout'])->name('cart.checkout');
