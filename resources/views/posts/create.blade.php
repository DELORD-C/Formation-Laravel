@extends('base')

@section('title') Create Post @endsection

@section('body')
    <form method="POST" action="{{ route('post.store') }}" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <input name="subject" class="form-control" id="subject" placeholder="Subject">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="body" class="form-control" id="body" placeholder="Body"></textarea>
            <label for="body">Body</label>
        </div>
        <input class="btn btn-primary" type="submit" name="Save">
    </form>
@endsection