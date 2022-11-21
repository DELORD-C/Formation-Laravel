<html lang="en">
    <head>
        <title>Post {{ $post->id }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <h2>Post {{ $post->id }}</h2>
        </div>
        <div>
            <a></a>
        </div>
        <p>Subject : {{ $post->subject }}</p>
        <p>Content : {{ $post->content }}</p>
        <a href="{{ url('/post') }}">Back</a>
    </body>
</html>
