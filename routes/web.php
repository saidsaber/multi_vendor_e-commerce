<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin/adminWeb.php';
});
Route::prefix('vendor')->group(function () {
    require __DIR__ . '/vendor/vendorWeb.php';
});

Route::get('/', HomePageController::class)->name('home');

Route::get('/login', function () {
    return view('login', ['role' => 'web']);
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('whishlist');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/product/{id}', function ($id) {
    $product = Product_Detail::with('size' , 'color' , 'images' , 'product' , 'product.colors' , 'product.sizes')->where('id', $id)->first();
    return view('product', ['product' => $product]);
})->name('product');

Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::post('/register', [UserController::class, 'register'])->name('post.register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/checkout', [CheckOutController::class, 'checkout'])->middleware('auth:sanctum')->name('checkout');
Route::get('/checkout/success', [CheckOutController::class, 'success'])->middleware('auth:sanctum')->name('checkout.success');
Route::get('/checkout/cancell', [CheckOutController::class, 'cancell'])->middleware('auth:sanctum')->name('checkout.cancel');
