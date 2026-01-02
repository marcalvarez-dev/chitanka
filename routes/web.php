<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/suma', [SumaController::class, 'index']);

Route::post('/suma', [SumaController::class, 'suma']);

Route::get('/products', [BookController::class, 'index']);
