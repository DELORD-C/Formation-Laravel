@extends('app')

@section('title')Post List @endsection

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h1>Post List</h1>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('/post/create') }}">Add New</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Subject</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        @foreach ($posts as $index => $post)
            <tr>
                <td>{{ $post->subject }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <form method="POST" action="{{ url('/post/' . $post->id) }}">
                        <a class="btn btn-info" href="{{ url('/post/' . $post->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ url('/post/' . $post->id . "/edit") }}">Edit</a>
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
