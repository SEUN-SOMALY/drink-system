<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DrinkController;

Route::resource('drinks', DrinkController::class);
Route::get('/', function () {
    return redirect('/drinks');
});

Route::resource('drinks', DrinkController::class);

// SHOW PAGE (extra safety even though resource already includes it)
Route::get('/drinks/{id}', [DrinkController::class, 'show'])->name('drinks.show');
Route::get('/', [DrinkController::class, 'dashboard'])->name('dashboard');

Route::resource('drinks', DrinkController::class);
