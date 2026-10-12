<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

// パスパラメータのIDは数字のみ
Route::pattern('product', '[0-9]+');

// CRUD API
Route::apiResource('products', ProductController::class);