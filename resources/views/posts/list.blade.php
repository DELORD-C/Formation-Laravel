<html lang="en">
    <body>
        @if ($message = Session::get('notif'))
            <p>{{ $message }}</p>
        @endif
        <table>
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
                        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <a href="{{ route('post.delete', $post->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    <a href="{{ route('post.create') }}">Create</a>
    </body>
</html>
