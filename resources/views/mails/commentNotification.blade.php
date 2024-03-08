Bonjour,<br>
<br>
Un nouveau commentaire à été laissé par {{ $comment->user->name }} sur l'article n°{{ $comment->post->id }} :<br>
"{{ $comment->body }}"<br>
<br>
<a href="{{ route("post.show", $comment->post->id) }}">Voir le commentaire</a>
