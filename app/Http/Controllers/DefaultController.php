<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{
    public function greeting() {
        return 'Hello World';
    }

    public function random($max = 100) {
        return rand(0, $max);
    }
}
