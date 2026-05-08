<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DrinkController;

Route::resource('drinks', DrinkController::class);
Route::get('/', function () {
    return redirect('/drinks');
});
