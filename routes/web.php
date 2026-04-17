<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

//Rutas publicas//

//Home
Route::get('/', [BookController::class, 'index'])->name('book.index');

//Detalles de libro
Route::get('/book/details/{id}', [BookController::class, 'details'])->name('book.details');

//Footer
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


//Auth routes//
require __DIR__ . '/auth.php';

//Rutas para usuarios logeados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard/password', function () {
        return view('account.change-password');
    })->name('account.password');

    Route::get('/account/orders', function () {
        return view('account.orders');
    })->name('account.orders');
});

//Rutas de administrador//

Route::middleware(['auth'])->group(function () {

    // CRUD libros (solo si quieres protegerlos)
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/delete/{book}', [BookController::class, 'destroy'])->name('book.delete');
});

//Route::resource('/editorial', [EditorialController::class]);