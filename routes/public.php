<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/courses', [PublicController::class, 'courses'])->name('public.courses');
Route::any('/courses/search', [PublicController::class, 'search'])->name('public.courses.search');
Route::get('/course/{slug}', [PublicController::class, 'course'])->name('public.course');
//    Route::get('/blog', [PublicController::class, 'blog'])->name('public.blog');
Route::get('/teachers', [PublicController::class, 'teachers'])->name('public.teachers');
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/r/{url_referred?}', [PublicController::class, 'index'])->name('public.index.referred');

Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'cartShow')->name('cart.show');
//    Route::get('/checkout', 'checkout')->name('cart.checkout');
    Route::get('add/item/{slug}/{checkout?}', 'addItem')->name('cart.add.item');
    Route::get('add/remove/{hash}', 'removeItem')->name('cart.remove.item');
    Route::post('place/order', 'placeOrder')->name('cart.placer.order');
    Route::get('success/{userBillId}', 'success')->name('cart.success');
});
Route::get('/privacy', [PublicController::class, 'privacy'])->name('public.privacy');
Route::get('/warranty', [PublicController::class, 'warranty'])->name('public.warranty');
Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');
Route::get('/help-center', [PublicController::class, 'helpCenter'])->name('public.help-center');
Route::get('/language/{lang}', [PublicController::class, 'changeLanguage'])->name('language.change');
Route::get('/wake', [PublicController::class, 'wake'])->name('public.wake');
Route::get('/events', [PublicController::class, 'events'])->name('public.events');
Route::get('/event/{activity}', [PublicController::class, 'event'])->name('public.event');
