<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\InProductController;
use App\Http\Controllers\Backend\StatisticalController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::group(['prefix' => 'admin','middleware' => CheckLogin::class], function () {
    Route::get('/', function () {
        return view('pages.main');
    })->name('admin');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('company', CompanyController::class);
    // Route::resource('receipt', ReceiptController::class);
    Route::resource('in_product', InProductController::class);
    Route::resource('user', UserController::class);
    route::group(['prefix' => 'statistic'], function () {
        route::get('product', [StatisticalController::class, 'Product'])->name('statistic.product');
        route::get('sale', [StatisticalController::class, 'SaleReport'])->name('statistic.report');
    });
});

Auth::routes();

route::get('/signout',[App\Http\Controllers\Auth\LogoutController::class,'getLogout'])->name('signout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('pages.frontend.index');
});
route::get('/product',[FrontendController::class,'getProduct'])->name('frontend.product');
route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index'])->name('cart.index');
route::get('checkout/{id}',[App\Http\Controllers\Frontend\CartController::class,'getCheckout'])->name('cart.checkout');
// route::post('/Order',[FrontendController::class,'postOrder'])->name('order.post');