@extends('base')

@section('title') Review List @endsection

@section('body')
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Movie</th>
            <th>Body</th>
            <th>Rating</th>
            <th>Updated At</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->movie }}</td>
                <td>{{ $review->body }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($review->updated_at)) }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($review->created_at)) }}</td>
                <td>
                    <form action="{{ route('review.destroy', $review->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('review.show', $review->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('review.edit', $review->id) }}">Edit</a>
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $reviews->links() !!}
    <a class="btn btn-primary" href="{{ route('review.create') }}">Create</a>
@endsection

