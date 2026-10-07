<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutPaymentController;
use App\Http\Controllers\CheckoutSuccessController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';



// App Routes
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/store', [ProductController::class, 'index'])->name('store.index');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('store.details');
Route::get('/details/{id}', [DetailController::class, 'index'])->name('shop.details');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::put('/cart', [CartController::class, 'store'])->name('cart.store');

    Route::get('/cart/add/{id}', [CartController::class, 'addToCartFromStore'])->name('cart.addfromstorepage');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('/checkout/points', [CheckoutController::class, 'points'])->name('checkout.points');

    Route::post('/checkout/payment/{payment}/1', [CheckoutPaymentController::class, 'index'])->name('checkout.stripe');

    Route::get('/checkout/{payment}/testing', [CheckoutPaymentController::class, 'index'])->name('checkout.success.testing');

    Route::get('/checkout/success/{id}', [CheckoutSuccessController::class, 'index'])->name('checkout.success');
});

Route::get('/theme/{theme}', function ($theme) {
    session(['theme' => $theme]);
    return redirect()->back();
})->name('theme.set');


// Filament Routes

// Override Filament's login route to redirect to your login
Route::get('/admin/login', function () {
    return redirect()->route('login'); // Your Laravel login route
})->name('filament.admin.auth.login');

// Override the logout route with a closure
Route::post('/admin/logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('store.index');
})->name('filament.admin.auth.logout');

// Features Routes
