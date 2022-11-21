<html lang="en">
    <head>
        <title>Post list</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <h2>Post List</h2>
        </div>
        <div>
            <a href="{{ url('post/create') }}">Add New</a>
        </div>
        <table>
            <tr>
                <th>Subject</th>
                <th>Content</th>
            </tr>
            @foreach ($posts as $index => $post)
                <tr>
                    <td>{{ $post->subject }}</td>
                    <td>{{ $post->content }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
