<?php

namespace App\Http\Controllers;

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

        return redirect()->route('post.show', $comment->post->id)
            ->with('success', 'Comment successfully liked.');
    }

    public function destroy(Like $like)
    {
        $this->authorize('like', $like->comment);

        $like->delete();
        return redirect()->route('post.show', $like->comment->post->id)
            ->with('success', 'Comment successfully unliked.');
    }
}
