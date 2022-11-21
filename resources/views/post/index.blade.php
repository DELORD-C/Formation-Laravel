@extends('app')

@section('title')Post List @endsection

@section('content')
    <div>
        <h1>Post List</h1>
    </div>
    <div>
        <a href="{{ url('/post/create') }}">Add New</a>
    </div>
    <table>
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
                    <a href="{{ url('/post/' . $post->id) }}">Show</a>
                    <a href="{{ url('/post/' . $post->id . "/edit") }}">Edit</a>
                    <form method="POST" action="{{ url('/post/' . $post->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
