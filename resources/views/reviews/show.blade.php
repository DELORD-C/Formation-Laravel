@extends('base')

@section('title') Show Review n°{{ $review->id }} @endsection

@section('body')
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Movie</th>
            <th>Body</th>
            <th>Rating</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->movie }}</td>
            <td>{{ $review->body }}</td>
            <td>{{ $review->rating }} / 5</td>
            <td>{{ date('d/m/Y H:i', strtotime($review->created_at)) }}</td>
            <td>{{ date('d/m/Y H:i', strtotime($review->updated_at)) }}</td>
            <td>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{ route('review.edit', $review->id) }}">Edit</a>
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </td>
        </tr>
    </table>
@endsection
