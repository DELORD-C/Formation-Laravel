<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);

        $post = new Post([
            'subject' => $request->get('subject'),
            'content' => $request->get('content')
        ]);

        $post->save();

        return redirect('/post')->with('success', 'Post successfully created');
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->subject = $request->get('subject');
        $post->content = $request->get('content');

        $post->update();

        return redirect('/post')->with('success', 'Post successfully updated');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/post')->with('success', 'Post successfully deleted');
    }
}
