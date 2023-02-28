<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
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

//require __DIR__.'/auth.php';

Route::controller(DefaultController::class)
    ->prefix('default')
    ->group(function() {
        Route::get('/random/{max?}', 'random')
            ->whereNumber('max');
        Route::get('/greetings', 'greetings');
        Route::match(['get', 'post'], '/code', 'code');
});

Route::redirect('/here', '/there', 301);
Route::view('/test', 'default', ['data' => 'Test View in Route']);

//Route::domain('{account}.example.com')->group(function() {
//    Route::get('user/{id}', function (string $account, string $id) {
//
//    });
//})->whereIn('toto', 'tata');

//Route::fallback(function () {
//    // ...
//});

require __DIR__ . '/user.php';

Route::resource('post', PostController::class);
