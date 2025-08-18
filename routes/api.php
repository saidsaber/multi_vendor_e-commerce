<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin/adminApi.php';
});

Route::post('/auth/register' , [UserController::class , 'register']);
Route::post('/auth/login' , [UserController::class , 'login']);
Route::post('/auth/logout' , [UserController::class , 'logout'])->Middleware('auth:sanctum');

