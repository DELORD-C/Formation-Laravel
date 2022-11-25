<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/post')->group(function() {
        Route::controller(PostController::class)->group(function() {
            Route::get('/', 'index');
            Route::get('/users', 'users');
            Route::get('/create', 'create');
            Route::get('/{id}', 'show');
            Route::get('/{id}/edit', 'edit');

            Route::post('/', 'store');
            Route::patch('/{id}', 'update');
            Route::delete('/{id}', 'delete');
        });
    });
});



require __DIR__.'/auth.php';
