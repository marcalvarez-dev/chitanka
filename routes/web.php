<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;

//Rutas publicas//

//Home
Route::get('/', [EditionController::class, 'index'])->name('edition.index');
Route::get('/genre/{genre}', [EditionController::class, 'filterByGenre'])->name('edition.genre');


//Detalles de libro
Route::get('/edition/details/{id}', [EditionController::class, 'details'])->name('edition.details');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/mailme', [MailController::class, 'mailMe'])->name('mailme');

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
    //Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/items', [CartItemController::class, 'store'])->name('cart.store');
    Route::delete('/cart/items/{id}', [CartItemController::class, 'destroy'])->name('cart.item.delete');

    //Admin
    //CRUD de las ediciones
    Route::get('/edition/create', [EditionController::class, 'create'])->name('edition.create');
    Route::post('/edition/store', [EditionController::class, 'store'])->name('edition.store');
    Route::get('/edition/edit/{edition}', [EditionController::class, 'edit'])->name('edition.edit');
    Route::put('/edition/update/{edition}', [EditionController::class, 'update'])->name('edition.update');
    Route::delete('/edition/delete/{edition}', [EditionController::class, 'destroy'])->name('edition.delete');

    Route::get('/dashboard/password', function () {
        return view('account.change-password');
    })->name('account.password');

    Route::get('/account/orders', function () {
        return view('account.history.index');
    })->name('history.orders');

    Route::get('/account/orders', [HistoryController::class, 'index'])->name('history');
});

Route::middleware('auth')->prefix('account')->group(function () {
    Route::resource('addresses', AddressController::class);
});
