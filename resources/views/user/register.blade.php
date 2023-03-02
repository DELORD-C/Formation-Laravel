@extends('layouts.layout')

@section('title')
    Register
@endsection

@section('content')
    <form method="POST" action="{{ route('store') }}">
    @csrf
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name"/>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email address"/>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
        </div>

        <div class="form-outline mb-4">
            <input type="email" name="referer" id="referer" class="form-control" placeholder="Referrer's email"/>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Already a member? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </form>
@endsection
