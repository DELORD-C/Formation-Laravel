<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'post_id',
        'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function post () {
        return $this->belongsTo(Post::class);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }

    public function getLikeByUser () {
        return $this->likes()->where('user_id', '=', Auth::user()->id)->first();
    }
}
