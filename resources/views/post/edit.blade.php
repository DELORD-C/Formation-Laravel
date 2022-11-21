<html lang="en">
    <head>
        <title>Post create</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <h2>Post Create</h2>
        </div>
        <div>
            <a></a>
        </div>
        <form method="POST" action="{{ url('/post/' . $post->id) }}">
            @method('PATCH')
            @csrf
            <input type="text" id="subject" name="subject" value="{{ $post->subject }}">
            <input type="text" id="content" name="content" value="{{ $post->content }}">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
