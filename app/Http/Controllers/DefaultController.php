<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{
    public function greeting() {
        return response('Hello World', 200)
            ->header('Content-type', 'text/plain');
    }

    public function random($max = 100) {
        return rand(0, $max);
    }
}
