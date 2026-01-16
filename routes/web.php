<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditorialController;


Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', [BookController::class, 'index'])->name('book.index');

Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/book/details/{id}', [BookController::class, 'details'])->name('book.details');

Route::resource('/editorial', [EditorialController::class]);
