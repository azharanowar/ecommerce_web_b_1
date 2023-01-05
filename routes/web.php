<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/shop',[EcommerceController::class,'shop'])->name('shop');
Route::get('/product-details',[EcommerceController::class,'productDetails'])->name('product-details');
Route::get('/cart',[EcommerceController::class,'cart'])->name('cart');
Route::get('/checkout',[EcommerceController::class,'checkout'])->name('checkout');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/category',[CategoryController::class,'saveCategory'])->name('category');
    Route::get('/status/{id}',[CategoryController::class,'status'])->name('status');
    Route::post('/delete',[CategoryController::class,'categoryDelete'])->name('delete');
    Route::get('/edit/{id}',[CategoryController::class,'categoryEdit'])->name('edit');


    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('sub-category');
    Route::post('/sub-category',[SubCategoryController::class,'saveSubCategory'])->name('sub-category');
    Route::get('/sub-status/{id}',[SubCategoryController::class,'status'])->name('sub-status');
    Route::post('/sub-delete',[SubCategoryController::class,'subCategoryDelete'])->name('sub-delete');
    Route::get('/sub-edit/{id}',[SubCategoryController::class,'subCategoryEdit'])->name('sub-edit');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class,'subCategoryUpdate'])->name('update-sub-category');

    Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::post('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
});
