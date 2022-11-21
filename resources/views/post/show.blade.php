@extends('app')

@section('title')Post {{ $post->id }} @endsection

@section('content')
    <div>
        <h1>Post {{ $post->id }}</h1>
    </div>
    <div>
        <a></a>
    </div>
    <p>Subject : {{ $post->subject }}</p>
    <p>Content : {{ $post->content }}</p>
    <a href="{{ url('/post') }}">Back</a>
@endsection
