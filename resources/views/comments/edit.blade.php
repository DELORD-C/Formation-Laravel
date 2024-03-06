@extends('base')

@section('title') Edit Comment n°{{ $comment->id }} @endsection

@section('body')
    <form method="POST" action="{{ route('comment.update', $comment->id) }}" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <textarea name="body" class="form-control" id="body" placeholder="Body">{{ $comment->body }}</textarea>
            <label for="body">Body</label>
        </div>
        <input class="btn btn-primary" type="submit" name="Save">
    </form>
@endsection
