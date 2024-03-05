@extends('base')

@section('title') Edit Post n°{{ $post->id }} @endsection

@section('body')
    <form method="POST" action="{{ route('post.update', $post->id) }}" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <input name="subject" class="form-control" id="subject" placeholder="Subject" value="{{ $post->subject }}">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="body" class="form-control" id="body" placeholder="Body">{{ $post->body }}</textarea>
            <label for="body">Body</label>
        </div>
        <input class="btn btn-primary" type="submit" name="Save">
    </form>
@endsection
