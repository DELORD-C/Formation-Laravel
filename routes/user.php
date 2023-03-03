<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'auth')->name('auth');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/reset', 'resetPassword')->name('password.reset');
    Route::any('/privilege/{user}', 'privilege')->name('privilege');
});
