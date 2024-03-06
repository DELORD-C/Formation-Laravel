@extends('base')

@section('title') Show Post n°{{ $post->id }} @endsection

@section('body')
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
            @can('editPost', $post)
                <th>Actions</th>
            @endcan
        </tr>
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->subject }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</td>
            <td>{{ date('d/m/Y H:i', strtotime($post->updated_at)) }}</td>
            @can('editPost', $post)
                <td>
                    <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('post.delete', $post->id) }}">Delete</a>
                </td>
            @endcan
        </tr>
    </table>
    @if(count($post->comments) > 0)
        <h2>Comments</h2>
        <table class="table">
            <tr>
                <th>Body</th>
                <th>Author</th>
                <th>Created At</th>
                @can('auth')
                    <th>Actions</th>
                @endcan
            </tr>
            @foreach($post->comments as $comment)
                <tr>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($comment->created_at)) }}</td>
                    <td>
                        @can('edit', $comment)
                            <a class="btn btn-primary" href="{{ route('comment.edit', $comment->id) }}">Edit <i class="bi bi-pencil-square"></i></a>
                        @endcan
                        @can('delete', $comment)
                            <a class="btn btn-danger" href="{{ route('comment.delete', $comment->id) }}">Delete <i class="bi bi-trash"></i></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    @can('auth')
        @include('comments/_create')
    @endcan
@endsection
