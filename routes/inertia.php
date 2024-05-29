<?php

use App\Http\Controllers\Inertia\Checkout\CheckoutIndexController;
use App\Http\Controllers\Inertia\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('cart/checkout', [CheckoutIndexController::class, 'index'])->name('cart.checkout');
Route::post('set/payment/{payment}',[CheckoutIndexController::class, 'setPayment'])->withoutMiddleware(['auth:web','auth:sanctum'])->name('inertia.depay.setPayment');
Route::get('track/payment/{payment}',[CheckoutIndexController::class, 'trackPayment'])->withoutMiddleware(['auth:web','auth:sanctum'])->name('inertia.depay.trackPayment');
Route::post('wallet/save', [WalletController::class, 'save']);
Route::get('wallet/', [WalletController::class, 'index'])->name('onboard');
