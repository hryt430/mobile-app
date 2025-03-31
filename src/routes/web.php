<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayPayController;
use Illuminate\Support\Facades\Route;


Route::get('/hoge', function () {
    return view('front.home');
});

Route::get('/hoge/checkout', function() {
    return view('front.confirmation');
})->name('checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/api/orders', 'OrderController@store');

Route::prefix('paypay')->as('paypay.')->group(function () {
    Route::view('/', 'paypay.payment')->name('index');
    Route::view('/complete', 'paypay.complete')->name('complete');
    Route::post('/payment', [PayPayController::class, 'payment'])->name('payment');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
