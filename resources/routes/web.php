<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;

// ...existing routes...

Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::post('/checkout/place-order', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');

// ...existing routes...