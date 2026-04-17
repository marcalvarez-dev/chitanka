<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\UserController;

//Rutas publicas//

//Home
Route::get('/', [EditionController::class, 'index'])->name('edition.index');

//Detalles de libro
Route::get('/edition/details/{id}', [EditionController::class, 'details'])->name('edition.details');

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
    Route::get('/edition/create', [EditionController::class, 'create'])->name('edition.create');
    Route::post('/edition/store', [EditionController::class, 'store'])->name('edition.store');
    Route::get('/edition/edit/{edition}', [EditionController::class, 'edit'])->name('edition.edit');
    Route::put('/edition/update/{edition}', [EditionController::class, 'update'])->name('edition.update');
    Route::delete('/edition/delete/{edition}', [EditionController::class, 'destroy'])->name('edition.delete');
});

//Route::resource('/editorial', [EditorialController::class]);