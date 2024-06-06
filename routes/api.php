<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Урок 13
Route::apiResource('hotels', HotelController::class);

// Домашка 13
Route::apiResource('products', ProductController::class);
