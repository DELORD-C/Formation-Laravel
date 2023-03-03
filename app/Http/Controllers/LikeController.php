<?php

namespace App\Http\Controllers;

use App\Events\LikeSubmitted;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $this->authorize('like', $comment);

        $like = new Like([
            'user_id' => Auth()->user()->id,
            'comment_id' => $comment->id
        ]);
        $like->save();
        LikeSubmitted::dispatch($comment);

        return $comment->refresh()->likes()->count();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('like', $comment);
        $like = $comment->getLikeByUser();
        $like->delete();

        return $comment->refresh()->likes()->count();
    }
}
