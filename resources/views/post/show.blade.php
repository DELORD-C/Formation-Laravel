@extends('layouts.layout')

@section('title')
    Show Post n°{{ $post->id }}
@endsection

@section('content')
    <ul>
        <li>Subject : {{ $post->subject }}</li>
        <li>Body : {{ $post->body }}</li>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th>Comment</th>
                <th>Author</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($post->comments as $comment)
            <tr>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->updated_at }}</td>
                <td>
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        @can('edit', $comment)
                        <a class="btn btn-primary" href="{{ route('comment.edit', $comment->id) }}">Edit</a>
                        @endcan
                        @can('delete', $comment)
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form action="{{ route('comment.store', $post->id) }}" method="post">
        @csrf
        <textarea name="body" required placeholder="Comment"></textarea>
        <input type="submit" value="Save">
    </form>
    <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
@endsection
