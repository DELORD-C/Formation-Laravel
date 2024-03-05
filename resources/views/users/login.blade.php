@extends('base')

@section('title') Login @endsection

@section('body')
    <form method="POST" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <input class="btn btn-primary" type="submit" name="Save" value="Login">
        <p class="text-center">Don't have an account? <a href="{{ route('user.register') }}">Register</a></p>
    </form>
@endsection
