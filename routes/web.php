<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\UserController;


/*Route::get('/', function () {
    return view('login');
});
*/

Route::get('/', [UserController::class, 'index'])->name('index');




Route::get('/welcome', [BookController::class, 'index'])->name('book.index');

Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
/** PUT es una variacion del post que indica que vamos a modificar un valor  */
Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/book/details/{id}', [BookController::class, 'details'])->name('book.details');

//Route::resource('/editorial', [EditorialController::class]);

/* Vistas del footer */
Route::view('/about', 'static.about')->name('about');
Route::view('/jobs', 'static.jobs')->name('jobs');
Route::view('/faq', 'static.faq')->name('faq');
Route::view('/returns', 'static.returns')->name('returns');
Route::view('/shipping', 'static.shipping')->name('shipping');
Route::view('/contact', 'static.contact')->name('contact');
Route::view('/terms', 'static.terms')->name('terms');
Route::view('/privacy', 'static.privacy')->name('privacy');
Route::view('/cookies', 'static.cookies')->name('cookies');
Route::view('/legal', 'static.legal')->name('legal');
Route::view('/payment', 'static.payment')->name('payment');
Route::view('/newsletter', 'static.newsletter')->name('newsletter');
