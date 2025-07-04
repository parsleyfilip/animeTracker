<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/login');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/saved-anime', 'saved-anime')
    ->middleware(['auth', 'verified'])
    ->name('saved-anime');

Route::view('/about', 'about')
    ->name('about');

Route::get('/reviews', function () {
    return view('reviews');
})->middleware(['auth', 'verified'])->name('reviews');

require __DIR__.'/auth.php';
