<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->isModerator()
            ? Response::allow()
            : Response::deny('You can only edit your own comments.');
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id
            || $user->id === $comment->post->user_id
            || $user->isModerator()
            ? Response::allow()
            : Response::deny('You can only delete your own comments or the ones on your posts.');
    }

    public function like (User $user, Comment $comment)
    {
        return $user != $comment->user;
    }
}
