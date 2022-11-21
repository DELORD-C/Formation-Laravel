@extends('app')

@section('title')Create Post @endsection

@section('content')
    <div>
        <h1>Post Create</h1>
    </div>
    <div>
        <a href="{{ url('/post') }}">Back</a>
    </div>
    <form method="POST" action="{{ url('/post/' . $post->id) }}">
        @method('PATCH')
        @csrf
        <input type="text" id="subject" name="subject" value="{{ $post->subject }}">
        <input type="text" id="content" name="content" value="{{ $post->content }}">
        <button type="submit">Submit</button>
    </form>
@endsection
