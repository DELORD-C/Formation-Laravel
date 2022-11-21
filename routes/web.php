<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/welcome', 'welcome');

Route::redirect('/hello', '/greeting', 301);
//Route::permanentRedirect('/bonjour', 'greeting');

Route::controller(DefaultController::class)->group(function() {
    Route::match(['get', 'post'], '/greeting', 'greeting');
    //Route::get('random/{max?}', [DefaultController::class, 'random'])->where(['max' => '[0-9]+']);
    Route::get('random/{max?}', 'random')->whereNumber('max')->name('random');
});

Route::prefix('/post')->group(function() {
   Route::controller(PostController::class)->group(function() {
       Route::get('/', 'index');
       Route::get('/create', 'create');
       Route::get('/{id}', 'show');
       Route::get('/{id}/edit', 'edit');

       Route::post('/', 'store');
   });
});
