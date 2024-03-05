<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View|RedirectResponse
    {
        // Utiliser une condition avec Gate::denies permet d'agir différemment
        if (Gate::denies('notAuth')) {
            return redirect('/')->with("error", "You are already logged in !");
        }
        return view('users.login');
    }

    public function auth(Request $request): RedirectResponse
    {
        $this->authorize('notAuth');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('notif', 'Successfully Logged In');
        }

        return redirect(route('user.login'))->with('error', 'Login details are not valid');
    }

    public function register(): View
    {
        $this->authorize('notAuth');
        return view('users.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('notAuth');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $this->create($request->all());

        return redirect(route('user.login'))->with('notif', 'User successfully created');
    }

    private function create(array $data): void
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $user->save();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('user.login'));
    }
}
