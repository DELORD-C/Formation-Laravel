<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
//        $uri = $request->path();
//        echo $uri;

//        $url = $request->url(); //url complète sans paramètres
//        $urlWithParameters = $request->fullUrl(); //url complète avec paramètres
//        $urlWithFilteredParameter = $request->fullUrlWithQuery(['type' => 'phone']);

//        echo $request->schemeAndHttpHost();

//        echo $request->method();

//        dump($request->date('date'));

//        if (Cache::has('post_list')) {
//            $posts = Cache::get('post_list');
//        }
//        else {
            $posts = Post::paginate(5);
//            Cache::add('post_list', $posts);
//        }

        $view = view('post.index',compact('posts'))->render();
        return response($view);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $post = new Post([
            'subject' => $request->input('subject'),
            'body' => $request->get('body'),
            'user_id' => Auth()->user()->id
        ]);
        $post->save();
        Cache::delete('post_list');

        return redirect()->route('post.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     */
    public function edit(Post $post)
    {
        Gate::authorize('own', $post);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('own', $post);
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->all());
        Cache::delete('post_list');

        return redirect()->route('post.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     */
    public function destroy(Post $post)
    {
        $this->authorize('own', $post);
        $post->delete();
        Cache::delete('post_list');

        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully.');
    }
}
