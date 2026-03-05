<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/levels', [LevelController::class, 'index']);
