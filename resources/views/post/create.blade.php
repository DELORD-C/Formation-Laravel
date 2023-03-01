@extends('layouts.layout')

@section('title')
    Create Post
@endsection

@section('content')
    <form method="POST" action="{{ route('post.store') }}" class="mb-3">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="body" id="body" placeholder="Body"></textarea>
            <label for="body">Body</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
    <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
@endsection
