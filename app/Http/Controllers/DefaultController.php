<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function random(int $max = 100)
    {
        return view('default', [
            'data' => rand(0, $max)
        ]);
    }

    public function greetings()
    {
        return view('default', [
             'data' => 'Hello World !'
        ]);
    }

    public function code()
    {
        //Afficher <h1>On voit le code HTML !</h1>
        return view('default', [
            'data' => '<h1>On voit le code HTML !</h1>'
        ]);
    }
}
