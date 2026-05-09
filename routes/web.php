<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DrinkController;

// Dashboard (HOME)
Route::get('/', [DrinkController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [DrinkController::class, 'dashboard'])->name('dashboard');
// CRUD
Route::resource('drinks', DrinkController::class);
