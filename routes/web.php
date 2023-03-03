<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
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
        Route::get('/query', 'query');
        Route::get('/mail', 'mail')->name('mail');
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

Route::resource('post', PostController::class)
    ->middleware('auth');

Route::get('/switch/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        return redirect()->back()->with('error', 'Unsupported locale.');
    }
    session()->put('_locale', $locale);
    return redirect()->back();
})->name('locale.switcher');

Route::controller(CommentController::class)
    ->prefix('comment')
    ->group(function() {
        Route::get('/edit/{comment}', 'edit')->name('comment.edit');
        Route::put('/update/{comment}', 'update')->name('comment.update');
        Route::post('/store/{post}', 'store')->name('comment.store');
        Route::delete('/destroy/{comment}', 'destroy')->name('comment.destroy');
})->middleware('auth');

Route::controller(LikeController::class)
    ->prefix('like')
    ->group(function() {
        Route::get('/store/{comment}', 'store')->name('like.store');
        Route::get('/destroy/{comment}', 'destroy')->name('like.destroy');
})->middleware('auth');
