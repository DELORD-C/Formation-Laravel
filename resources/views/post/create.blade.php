@extends('app')

@section('title')Create Post @endsection

@section('content')
    <div>
        <h1>Create Post</h1>
    </div>
    <div>
        <a class="btn btn-info" href="{{ url('/post') }}">Back</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ url('/post') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="subject">Subject :</label>
            <input type="text" id="subject" name="subject">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content :</label>
            <input type="text" id="content" name="content">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
