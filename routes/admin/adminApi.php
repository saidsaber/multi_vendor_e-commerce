<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\StoreController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Middleware\Api\Admin\IsAdminMiddleware;
use App\Http\Trait\ApiResponse;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum' , IsAdminMiddleware::class])->group(function () {
    Route::post('/auth/logout', [UserController::class, 'logout']);

    Route::post('create/category' , [CategoryController::class , 'CreateCategory']);
    
    Route::get('get/categories' , [CategoryController::class , 'GetCategories']);

    Route::get('get/stores'  , [StoreController::class , 'getAcceptStores']);
    
    Route::get('get/request/store'  , [StoreController::class , 'getRequestStores']);

    Route::get('accept/request/store'  , [StoreController::class , 'getRequestStores']);
});
