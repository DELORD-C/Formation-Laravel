<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Comment $comment): Response
    {
//        if ($user->id === $comment->user->id) {
//            return Response::allow();
//        }
//
//        return Response::deny('You can only edit your own comments');

        return $user->id === $comment->user->id
            ? Response::allow()
            : Response::deny('You can only edit your own comments');
    }

    public function delete(User $user, Comment $comment): Response
    {
        return $user->id === $comment->user->id || $user->id === $comment->post->user->id
            ? Response::allow()
            : Response::deny('You can only edit your own comments');
    }
}
