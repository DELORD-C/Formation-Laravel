<html lang="en">
    <body>
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <input name="subject" placeholder="Subject">
            <textarea name="body" placeholder="Body"></textarea>
            <input type="submit" name="Save">
        </form>
    </body>
</html>
