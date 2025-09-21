<?php

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Vendor\CreateProduct;
use App\Livewire\Vendor\ProductDetails;
use App\Http\Controllers\Vendor\UserController;
use App\Http\Controllers\Vendor\StoreController;
use App\Http\Controllers\Vendor\OrdersController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Middleware\Vendor\IsVendorMiddleWare;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\vendor\CreateProductController;

Route::post('create/store', [StoreController::class, 'create'])->name('vendor.create.store');

Route::get('create/store', [StoreController::class, 'index'])->middleware('auth');

Route::get('/login', function () {
    return view('login', ['role' => 'vendor']);
})->name('vendor.login');

Route::post('/login', [UserController::class, 'login'])->name('post.vendor.login');

Route::middleware(IsVendorMiddleWare::class)->group(function () {

        Route::get('/', DashboardController::class)->name('vendor');


    Route::get('/products', [ProductController::class, 'index'])->name('vendor.product');

    Route::get('/product/details/{id}', function ($id) {
        return view('vendor.productDetails', ['id' => $id]);
    })->name('vendor.product.details');

    // Route::get('product/details' , ProductDetails::class);
    Route::get('/orders', [OrdersController::class, 'index'])->name('vendor.order');
    Route::get('/orders/{id}', function ($id) {
        return view('vendor.orderItems', ['id' => $id]);
    })->name('vendor.order_item');

    Route::get('/product/create', function () {
        return view('vendor.createproduct');
    })->name('vendor.create.product');

    Route::get('reviews', function () {
        return view('vendor.productReviews');
    })->name('reviews');

    Route::get('refund_request', function () {
        return view('vendor.refundRequest');
    })->name('refundRequest');

    Route::get('/vendor/logout', [UserController::class, 'logout'])->name('vendor.logout');
    Route::post('/create_product', [CreateProductController::class, 'createProduct'])->name('vendor.post.create.product');
});
