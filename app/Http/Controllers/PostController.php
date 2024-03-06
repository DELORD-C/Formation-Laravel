<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function create(): View
    {
        $this->authorize('auth');
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('auth');
        $request->validate([
            'body' => 'required',
            'subject' => 'required'
        ]);

        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect(route('post.list'))->with('notif', 'Post successfully created');
    }

    public function list (Request $request): View
    {
        $posts = Post::paginate(5);

        return view('posts.list', [
            'posts' => $posts
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function edit (Post $post): View
    {
        $this->authorize('editPost', $post);
        return View('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('editPost', $post);
        $request->validate([
            'body' => 'required',
            'subject' => 'required'
        ]);

        $post->update($request->all());

        return redirect(route('post.list'))->with('notif', 'Post successfully updated');
    }

    public function delete(Post $post): RedirectResponse
    {
        $this->authorize('editPost', $post);
        $post->delete();

        return redirect(route('post.list'))->with('notif', 'Post successfully deleted');
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
