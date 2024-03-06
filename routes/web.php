<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(DefaultController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/random/{min?}/{max?}', 'random')->whereNumber(['min', 'max'])->name('random');
});

Route::controller(PostController::class)
    ->name('post.')
    ->prefix('/post')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::any('/list', 'list')->name('list');
        Route::get('/edit/{post}', 'edit')->name('edit');
        Route::post('/update/{post}', 'update')->name('update');
        Route::get('/delete/{post}', 'delete')->name('delete');
        Route::get('/{post}', 'show')->name('show');
});

Route::controller(UserController::class)
    ->name('user.')
    ->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'store')->name('store');
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'auth')->name('auth');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::resource('review', ReviewController::class);

Route::controller(CommentController::class)
    ->name('comment.')
    ->prefix('/comment')
    ->group(function () {
        Route::post('/store/{post}', 'store')->name('store');
        Route::get('/edit/{comment}', 'edit')->name('edit');
        Route::post('/update/{comment}', 'update')->name('update');
        Route::get('/delete/{comment}', 'delete')->name('delete');
    });

//Route::get('/random/1000', function () {
//   return rand(0, 1000);
//});
