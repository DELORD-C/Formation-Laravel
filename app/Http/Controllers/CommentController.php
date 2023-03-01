<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment([
            'body' => $request->get('body'),
            'user_id' => Auth()->user()->id,
            'post_id' => $post->id
        ]);
        $comment->save();

        return redirect()->back()
            ->with('success', 'Comment successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     */
    public function edit(Comment $comment)
    {
        $this->authorize('edit', $comment);
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('edit', $comment);
        $request->validate([
            'body' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->route('post.show', ['post' => $comment->post->id])
            ->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
//        $post = $comment->post;
        $comment->delete();
        return redirect()->route('post.show', ['post' => $comment->post->id])
            ->with('success', 'Comment deleted successfully.');
    }
}
