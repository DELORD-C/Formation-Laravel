<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DefaultController extends Controller
{
    public function index(): View
    {
        return view('default', [
            "var" => '<h1>Hello World !</h1>'
        ]);
    }

    public function random(int $min = 0, int $max = 100): View
    {
        return view('default', [
            'var' => rand($min, $max)
        ]);
    }
}
