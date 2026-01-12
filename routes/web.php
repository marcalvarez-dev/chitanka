<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', [BookController::class, 'index'])->name("books.index");

Route::get('/catalogo', function () {
    return view('catalog');
});

Route::get('/suma', [SumaController::class, 'index']);

Route::post('/suma', [SumaController::class, 'suma']);

//Route::get('/products', [BookController::class, 'index']);
