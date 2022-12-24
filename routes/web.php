<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CategoryController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/change-status/{id}', [CategoryController::class, 'changeStatus'])->name('change-status');

    Route::post('/create-category', [CategoryController::class, 'addCategory'])->name('create-category');
});

Route::get('/', [EcommerceController::class, 'index'])->name('/');
Route::get('/shop', [EcommerceController::class, 'shop'])->name('shop');
Route::get('/product-details', [EcommerceController::class, 'productDetails'])->name('product-details');
Route::get('/cart', [EcommerceController::class, 'cart'])->name('cart');
Route::get('/checkout', [EcommerceController::class, 'checkout'])->name('checkout');
