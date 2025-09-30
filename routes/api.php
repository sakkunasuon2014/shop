<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ProductController;

Route::apiResource('items', ItemController::class);
Route::apiResource('product', ProductController::class);
