@extends('layouts.layout')

@section('title')
    Edit Comment n°{{ $comment->id }}
@endsection

@section('content')
    <form method="POST" action="{{ route('comment.update', $comment->id) }}" class="mb-3">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <textarea class="form-control" name="body" id="body" placeholder="Body">{{ $comment->body }}</textarea>
            <label for="body">Body</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
    <a class="btn btn-primary" href="{{ route('post.show', $comment->post->id) }}">Back</a>
@endsection
