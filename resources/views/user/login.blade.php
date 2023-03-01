@extends('layouts.layout')

@section('title')
    Login
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email address"/>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
@endsection
