@extends('app')

@section('title')Create Post @endsection

@section('content')
    <div>
        <h1>Post Create</h1>
    </div>
    <div>
        <a class="btn btn-info" href="{{ url('/post') }}">Back</a>
    </div>
    <form method="POST" action="{{ url('/post/' . $post->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group mb-3">
            <label for="subject">Subject :</label>
            <input type="text" id="subject" name="subject" value="{{ $post->subject }}">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content :</label>
            <input type="text" id="content" name="content" value="{{ $post->content }}">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>

    </form>
@endsection
