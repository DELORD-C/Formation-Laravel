<?php

use App\Http\Controllers\DefaultController;
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

//Route::get('/random/1000', function () {
//   return rand(0, 1000);
//});
