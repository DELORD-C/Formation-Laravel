<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class ApiController extends Controller
{
    public function posts() {
        return Post::all();
    }

    public function comments(Post $post) {
        return $post->comments;
    }

    public function users() {
        return User::all();
    }
}
