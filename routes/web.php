<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/store', [PageController::class, 'store']);
Route::get('/product', [PageController::class, 'product']);
Route::get('/checkout', [PageController::class, 'checkout']);
