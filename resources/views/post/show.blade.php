@extends('layouts.layout')

@section('title')
    Show Post n°{{ $post->id }}
@endsection

@section('content')
    <ul>
        <li>Subject : {{ $post->subject }}</li>
        <li>Body : {{ $post->body }}</li>
    </ul>
    <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
@endsection
