<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::resource('products', ProductController::class);

/*
|--------------------------------------------------------------------------
| Orders (FIXED - ONLY ONE ROUTE)
|--------------------------------------------------------------------------
*/
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::resource('orders', OrderController::class);
/*
|--------------------------------------------------------------------------
| Customers
|--------------------------------------------------------------------------
*/
Route::resource('customers', CustomerController::class);
