<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('auth');
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('post.show', $post->id))->with('notif', 'Comment successfully created');
    }

    public function edit (Comment $comment): View
    {
        $this->authorize('editComment', $comment);
        return View('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $this->authorize('editComment', $comment);
        $request->validate([
            'body' => 'required'
        ]);

        $comment->update($request->all());

        return redirect(route('post.show', $comment->post->id))->with('notif', 'Comment successfully updated');
    }

    public function delete(Comment $comment): RedirectResponse
    {
        $this->authorize('deleteComment', $comment);
        $comment->delete();

        return redirect(route('post.show', $comment->post->id))->with('notif', 'Comment successfully deleted');
    }
}
