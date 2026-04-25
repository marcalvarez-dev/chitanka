<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;

/* RUTAS PUBLICAS */

// Home
Route::get('/', [EditionController::class, 'index'])->name('edition.index');

// Filtros / búsqueda
Route::get('/genre/{genre}', [EditionController::class, 'filterByGenre'])->name('edition.genre');
Route::get('/search', [EditionController::class, 'search'])->name('search');

// Detalles libro
Route::get('/edition/details/{id}', [EditionController::class, 'details'])->name('edition.details');

// Mail test
//Route::get('/mailme', [MailController::class, 'mailMe'])->name('mailme');

// Footer (estáticas)
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


/* AUTH (USUARIO LOGUEADO) */

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Carrito
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/items', [CartItemController::class, 'store'])->name('cart.store');
    Route::delete('/cart/items/{id}', [CartItemController::class, 'destroy'])->name('cart.item.delete');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');

    // Checkout 
    Route::post('/checkout/review', [CartController::class, 'review'])->name('checkout.review');
    Route::post('/checkout/finish', [CartController::class, 'checkout'])->name('checkout.finish');

    // Cuenta
    Route::get('/account/password', function () {
        return view('account.change-password');
    })->name('account.password');
    Route::put('/account/change-password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/account/orders', [HistoryController::class, 'index'])->name('history');

    // Addresses resource
    Route::prefix('account')->group(function () {
        Route::resource('addresses', AddressController::class);
    });

    // Checkout
    Route::get('/checkout', [CartController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/checkout', [CartController::class, 'checkoutForm'])->name('checkout.form');
});


/* ADMIN (AUTH + ADMIN) */

Route::middleware(['auth', 'admin'])->group(function () {
    // CRUD Ediciones
    Route::get('/edition/create', [EditionController::class, 'create'])->name('edition.create');
    Route::post('/edition/store', [EditionController::class, 'store'])->name('edition.store');
    Route::get('/edition/edit/{edition}', [EditionController::class, 'edit'])->name('edition.edit');
    Route::put('/edition/update/{edition}', [EditionController::class, 'update'])->name('edition.update');
    Route::delete('/edition/delete/{edition}', [EditionController::class, 'destroy'])->name('edition.delete');
});
