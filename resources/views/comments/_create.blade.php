<h3>Leave a comment</h3>
<form method="POST" action="{{ route('comment.store', $post->id) }}" class="w-50 m-auto">
    @csrf
    <div class="form-floating mb-3">
        <textarea name="body" class="form-control" id="body" placeholder="Body"></textarea>
        <label for="body">Body</label>
    </div>
    <input class="btn btn-primary" type="submit" name="Save">
</form>
