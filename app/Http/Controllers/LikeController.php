<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle (Comment $comment) {
        $this->authorize('auth');
        if (Auth::user()->hasLiked($comment)) {
            $like = Auth::user()->getLike($comment);
            $like->delete();
        }
        else {
            $like = new Like([
               'user_id' => Auth::user()->id,
               'comment_id' => $comment->id
            ]);
            $like->save();
        }
        return redirect(route('post.show', $comment->post->id));
    }
}
