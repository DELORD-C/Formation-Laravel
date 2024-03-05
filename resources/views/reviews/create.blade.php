@extends('base')

@section('title') Create Review @endsection

@section('body')
    <form method="POST" action="{{ route('review.store') }}" class="w-50 m-auto">
        @csrf
        <div class="form-floating mb-3">
            <input name="movie" class="form-control @error('movie') is-invalid @enderror" id="movie" placeholder="Movie">
            <label for="movie">Movie</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="body" class="form-control" id="body" placeholder="Body"></textarea>
            <label for="body">Body</label>
        </div>
        <input type="range" class="form-range" min="0" max="5" id="rating" name="rating">
        <input class="btn btn-primary" type="submit" name="Save">
    </form>
@endsection
