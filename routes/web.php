<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');

Route::resource('products', ProductController::class);
Route::get('/orders', function () {
    return view('orders.index');
})->name('orders.index');
// use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
