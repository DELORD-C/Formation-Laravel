<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(DefaultController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/random/{min?}/{max?}', 'random')->whereNumber(['min', 'max']);
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
    });

//Route::get('/random/1000', function () {
//   return rand(0, 1000);
//});
