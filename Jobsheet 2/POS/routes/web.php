<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);

Route::prefix('category')->group(function () {
    Route::get('/category/food-beverage', [ProductsController::class, 'foodBeverage']);
	Route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
	Route::get('/home-care', [ProductsController::class, 'homeCare']);
	Route::get('/baby-kid', [ProductsController::class, 'babyKid']);
    });

Route::get('/user', function () {
    return view('user', ['id' => 1, 'name' => 'Febryan']);
});

Route::get('/sales', [App\Http\Controllers\SalesController::class, 'sales']);
