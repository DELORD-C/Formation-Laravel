<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Post;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
//        $users = DB::table('posts')
//            ->join('users', 'users.id', '=', 'posts.user_id')
//            ->select('posts.*', 'users.*')
//            ->get();
//        return $users;
//
//        $user = User::find(2);
//        dump($user);
//        $user->delete();

//        Storage::put('file.txt', 'Test');
//        $file = Storage::get('file.txt');
//        dump($file);

//        $dompdf = new Dompdf();
//        $dompdf->loadHtml(view('mails.test')->render());
//        $dompdf->render();
//        $dompdf->stream();


    }

    public function mail()
    {
        Mail::to('dawantestlaravel@gmail.com')
        ->send(new TestMail());
    }
}
