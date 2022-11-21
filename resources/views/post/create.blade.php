@extends('app')

@section('title')Create Post @endsection

@section('content')
    <div>
        <h1>Create Post</h1>
    </div>
    <div>
        <a href="{{ url('/post') }}">Back</a>
    </div>
    <form method="POST" action="{{ url('/post') }}">
        @csrf
        <input type="text" id="subject" name="subject">
        <input type="text" id="content" name="content">
        <button type="submit">Submit</button>
    </form>
@endsection
