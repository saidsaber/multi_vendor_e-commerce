<?php

use App\Http\Controllers\vendor\CreateProductController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\StoreController;
use App\Http\Controllers\Vendor\UserController;
use App\Http\Middleware\Vendor\IsVendorMiddleWare;
use App\Livewire\Vendor\CreateProduct;
use App\Livewire\Vendor\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::post('create/store', [StoreController::class, 'create'])->name('vendor.create.store');

Route::get('create/store', [StoreController::class, 'index'])->middleware('auth');

Route::get('/login', function () {
    return view('login', ['role' => 'vendor']);
})->name('vendor.login');

Route::post('/login', [UserController::class, 'login'])->name('post.vendor.login');

Route::middleware(IsVendorMiddleWare::class)->group(function () {

    Route::get('/', function () {
        return view('vendor.main');
    })->name('vendor');

    Route::get('/products', [ProductController::class, 'index'])->name('vendor.product');

    Route::get('/product/details/{id}', function ($id) {
        return view('vendor.productDetails', ['id' => $id]);
    })->name('vendor.product.details');

    // Route::get('product/details' , ProductDetails::class);
    Route::get('/orders', function () {
        return view('vendor.orders');
    })->name('vendor.order');

    Route::get('/product/create', function () {
        return view('vendor.createproduct');
    })->name('vendor.create.product');

    Route::get('/vendor/logout', [UserController::class, 'logout'])->name('vendor.logout');
    Route::post('/create_product', [CreateProductController::class, 'createProduct'])->name('vendor.post.create.product');
});
