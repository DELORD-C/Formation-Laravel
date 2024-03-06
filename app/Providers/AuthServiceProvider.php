<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('notAuth', function (?User $user) {
            if (empty($user)) {
                return Response::allow();
            }
            return Response::deny();
        });

        Gate::define('auth', function (?User $user) {
            if (!empty($user)) {
                return Response::allow();
            }
            return Response::deny();
        });

        Gate::define('editPost', function (?User $user, Post $post) {
            if (!empty($user) && $user->id === $post->user->id) {
                return Response::allow();
            }
            return Response::deny();
        });

        Gate::define('editComment', function (?User $user, Comment $comment) {
            if (!empty($user) && $user->id === $comment->user->id) {
                return Response::allow();
            }
            return Response::deny();
        });

        Gate::define('deleteComment', function (?User $user, Comment $comment) {
            if (!empty($user) && ($user->id === $comment->user->id || $user->id === $comment->post->user->id)) {
                return Response::allow();
            }
            return Response::deny();
        });
    }
}
