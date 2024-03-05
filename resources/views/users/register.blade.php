@extends('base')

@section('title') Register @endsection

@section('body')
    <form method="POST" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <input name="name" class="form-control" id="name" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <input class="btn btn-primary" type="submit" name="Save" value="Register">
        <p class="text-center">Already a member? <a href="{{ route('user.login') }}">Login</a></p>
    </form>
@endsection
