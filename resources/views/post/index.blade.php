@extends('layouts.layout')

@section('title')
    Post List
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Subject</th>
                <th>Body</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->subject }}</td>
                <td class="text-truncate" style="max-width: 300px">{{ $post->body }}</td>
                <td>{{ $post->user?->email }}</td>
                <td>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-flex">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ route('post.show', $post->id) }}">Show</a>
                        @can('own', $post)
                            <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
