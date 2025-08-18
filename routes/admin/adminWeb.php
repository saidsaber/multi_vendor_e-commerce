<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StoresController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\Admin\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return view('login', ['role' => 'admin']);
})->name('admin.login');

Route::post('login', [UserController::class, 'login'])->name('post.admin.login');

Route::middleware(IsAdminMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('admin.main');
    })->name('admin.main');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/refund_request', function () {
        return view('admin.refundRequest');
    })->name('admin.refund_request');

    Route::get('/stores', [StoresController::class , 'index'])->name('admin.stores');
    Route::post('/stores/{store}', [StoresController::class , 'accept'])->name('admin.accept.store');

    Route::get('/joinRequest', [StoresController::class , 'requestStore'])->name('admin.joinRequest');

    Route::get('/category', function(){
        return view('admin.category');
    })->name('admin.category');

    Route::get('/createCategory', function () {
        return view('admin.create_category');
    })->name('admin.create.category');

    Route::post('/category' , [CategoryController::class , 'create'])->name('admin.post.create.category');
    Route::delete('/category/delete/{category}' , [CategoryController::class , 'delete'])->name('admin.delete.category');
    Route::get('/category/update/{category}' , [CategoryController::class , 'update'])->name('admin.update.category');
    Route::put('/category/update/{category}' , [CategoryController::class , 'edit'])->name('admin.edit.category');
    Route::post('/logout' , [UserController::class , 'logout'])->name('admin.logout');
});
