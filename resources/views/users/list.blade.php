@extends('base')

@section('title') Post List @endsection

@section('body')
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Subject</th>
            <th>Body</th>
            <th>Updated At</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->subject }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($post->updated_at)) }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('post.delete', $post->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $posts->links() !!}
    <a class="btn btn-primary" href="{{ route('post.create') }}">Create</a>
@endsection
