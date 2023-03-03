<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referer()
    {
        return $this->belongsTo(User::class);
    }

    public function godChildren()
    {
        return $this->hasMany(User::class, 'referer');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    public function isModerator() {
        return $this->roles()->where('name', 'Moderator')->exists();
    }

    public function upgrade() {
        $id = Role::all()->where('name', 'Admin')->first()->id;
        $this->roles()->attach($id);
    }

    public function downgrade() {
        $id = Role::all()->where('name', 'Admin')->first()->id;
        $this->roles()->detach($id);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function hasLiked(Comment $comment) {
        return $this->likes()->where('comment_id', '=', $comment->id)->exists();
    }
}
