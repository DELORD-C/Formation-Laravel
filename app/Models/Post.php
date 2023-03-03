<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable, Searchable;

    protected $fillable = [
        'subject',
        'body',
        'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function prunable()
    {
        return static::all();
    }
}
