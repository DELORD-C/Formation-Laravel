<html lang="en">
    <body>
        <form method="POST" action="{{ route('post.update', $post->id) }}">
            @csrf
            <input name="subject" placeholder="Subject" value="{{ $post->subject }}">
            <textarea name="body" placeholder="Body">{{ $post->body }}</textarea>
            <input type="submit" name="Save">
        </form>
    </body>
</html>
