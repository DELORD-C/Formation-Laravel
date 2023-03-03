<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function query()
    {
        $users = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->select('users.email', 'roles.name')
            ->get();
        dump($users);

        $user = User::find(2);
        dump($user);
        $user->delete();
    }

    public function mail()
    {
        Mail::to('dawantestlaravel@gmail.com')
        ->send(new TestMail());
    }
}
