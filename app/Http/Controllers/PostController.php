<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'body' => 'required',
            'subject' => 'required'
        ]);

        $post = new Post();
        $post->subject = $request->subject;
        $post->body = $request->body;

        $post->save();

        return redirect(route('post.list'));
    }

    public function list (): View
    {
        $posts = Post::all();

        return view('posts.list', [
            'posts' => $posts
        ]);
    }

    public function edit (Post $post): View
    {
        return View('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'body' => 'required',
            'subject' => 'required'
        ]);

        $post->update($request->all());

        return redirect(route('post.list'));
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect(route('post.list'));
    }
}
