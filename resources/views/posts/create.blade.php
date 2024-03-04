<html lang="en">
    <body>
        @if ($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <input id="subject" name="subject" class="@error('subject') is-invalid @enderror" placeholder="Subject">
            <textarea name="body" placeholder="Body"></textarea>
            <input type="submit" name="Save">
        </form>
    </body>
</html>
