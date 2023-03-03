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
                <th>Likes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($post->comments as $comment)
            <tr>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->updated_at }}</td>
                <td>{{ $comment->likes->count() * 5 }}</td>
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
                        @can('like', $comment)
                            @if(auth()->user()->hasLiked($comment))
                                <button type="button" class="like-btn" method="unlike" comment="{{ $comment->id }}"><i class="bi bi-heart-fill"></i></button>
                            @else
                                <button type="button" class="like-btn" method="like" comment={{ $comment->id }}><i class="bi bi-heart"></i></button>
                            @endif
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form action="{{ route('comment.store', $post->id) }}" method="post" class="mb-3">
        @csrf
        <div class="form-floating mb-3">
            <textarea name="body" required placeholder="Comment" class="form-control" id="body" placeholder="Comment"></textarea>
            <label for="body">Comment</label>
        </div>
        <input class="btn btn-primary" type="submit" value="Save">
    </form>
    <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
@endsection
