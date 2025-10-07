<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tentang', function () {
    return view('tentang');
})->middleware(['auth', 'verified'])->name('tentang');

Route::get('/keluarga', function () {
    return view('keluarga');
})->middleware(['auth', 'verified'])->name('keluarga');

Route::get('/link/{name}', function ($name) {
    return view('link', ['name' => ucfirst($name)]);
})->middleware(['auth', 'verified'])->name('link');




require __DIR__ . '/auth.php';
