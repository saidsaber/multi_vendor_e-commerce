<?php

use App\Http\Controllers\WishListController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomePageController;

require __DIR__ . '/auth.php';
Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin/adminWeb.php';
});
Route::prefix('/vendor')->group(function () {
    require __DIR__ . '/vendor/vendorWeb.php';
});

Route::get('/', HomePageController::class)->name('home');

Route::get('/category/{id}', function ($id) {
    $data = [
        'categories' => [],
        'products' => Product::with('product_details', 'product_details.size', 'product_details.color', 'product_details.images', 'category', 'colors')->where('category_id', $id)->whereHas('product_details')->get()
    ];
    // dd($data['products']);
    return view('index', ['data' => $data]);
})->name('category.products');

Route::post('wishlist/{product}/add' , [WishListController::class , 'addToWishList'])->name('add.wishlist');

Route::get('/login', function () {
    return view('login', ['role' => 'web']);
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/wishlist',[WishListController::class , 'index'])->name('whishlist');

Route::post('wishlist/delete/{wish_List}' , [WishListController::class , 'deleteWishlist'])->name('delete.wishlist');

Route::get('/cart', function () {
    $cart =Cart::where('user_id' , Auth::id())->get();
    return view('cart' , ['cart' => $cart]);
})->name('cart');
 
Route::get('dashboard' , function(){
    return view('dashboard' , ['page' => 'dashboard']);
})->name('dashboard');


Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/orders/{order}/return', [ReturnController::class, 'create'])->name('returns.create');
Route::post('/orders/{order}/return', [ReturnController::class, 'store'])->name('returns.store');


Route::get('orders' , [OrderController::class , 'index'])->name('orders');
Route::get('orders/{order}' , [OrderController::class , 'order'])->name('order');
Route::post('orders/create' , [OrderController::class , 'createOrder'])->name('order.create');
Route::post('orders/cancell/{order}' , [OrderController::class , 'cancellOrder'])->name('order.cancell');
Route::get('adresses' , [AdressController::class , 'index'])->name('adresses');
Route::post('adresses/create' , [AdressController::class , 'createAddress'])->name('adresses.post.create');
Route::delete('adresses/delete/{adress}' , [AdressController::class , 'delete'])->name('adresses.delete');
Route::get('adresses/create' , function(){
    return view('dashboard', ['page' => 'createAddrese']);
})->name('adresses.create');

Route::get('/product/{id}', function ($id) {
    // $cart = Cart::where('user_id' , Auth::id())->get();
    // $product = Product_Detail::with( 'size' , 'color' , 'images' , 'product' , 'product.colors' , 'product.sizes')->where('id', $id)->first();
    return view('product', ['id' => $id ]);
})->name('product');

Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::post('/register', [UserController::class, 'register'])->name('post.register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/checkout/success', [CheckOutController::class, 'success'])->middleware('auth:sanctum')->name('checkout.success');
Route::get('/checkout/cancel', [CheckOutController::class, 'cancel'])->middleware('auth:sanctum')->name('checkout.cancel');
Route::get('/checkout/{orders}', [CheckOutController::class, 'checkout'])->middleware('auth:sanctum')->name('checkout');
