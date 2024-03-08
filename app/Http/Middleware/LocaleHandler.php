<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleHandler
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('_locale')) {
            App::setLocale(session()->get('_locale'));
        }
        return $next($request);
    }
}
