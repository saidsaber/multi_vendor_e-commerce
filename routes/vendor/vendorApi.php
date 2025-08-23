<?php

use App\Http\Controllers\Api\Vendor\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Api\Vendor\IsVendorMiddleWare;
use App\Http\Controllers\Api\Vendor\UserController;

Route::post('auth/login' , [UserController::class , 'login']);

Route::middleware(['auth:sanctum' , IsVendorMiddleWare::class])->group(function(){
    Route::post('auth/logout' , [UserController::class , 'logout']);
    // Route::get('products' , [ProductController::class , 'getAllProducts']);
});
