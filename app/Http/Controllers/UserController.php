<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('notAuth');
        return view('user.login');
    }

    public function auth (Request $request)
    {
        $this->authorize('notAuth');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->with('success', 'Successfully Signed In.');
        }

        return redirect('login')->with('error', 'Login details are not valid');
    }

    public function register()
    {
        $this->authorize('notAuth');
        return view('user.register');
    }

    public function store(Request $request)
    {
        $this->authorize('notAuth');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect('/')->with('success', 'You have signed-in.');
    }

    private function create(array $data)
    {

        if (User::where('email', '=', $data['referer'])->exists()) {
            $data['referer'] = User::where('email', '=', $data['referer'])->first()->id;
        }
        else {
            $data['referer'] = null;
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referer' => $data['referer']
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function privilege(User $user)
    {
        $this->authorize('privilege', [$user]);
        if (!$user->isAdmin()) {
            $user->upgrade();
        }
        return redirect()->back();
    }

    public function resetPassword (Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        dump(__($status));
    }
}
