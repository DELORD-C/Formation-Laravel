<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleHandler
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('_locale')) {
            $browserLocale = substr($request->header('Accept-Language'), 0, 2);
            if (in_array($browserLocale, ['fr', 'en'])) {
                session()->put('_locale', $browserLocale);
            }
            else {
                session()->put('_locale', 'en');
            }
        }
        App::setLocale(session()->get('_locale'));
        return $next($request);
    }
}
