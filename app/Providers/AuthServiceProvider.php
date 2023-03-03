<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Policies\AuthPolicy;
use App\Policies\CommentPolicy;
use App\Policies\LikePolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('own-post', function (User $user, Post $post) {
//            return $user->id === $post->user_id;
//        });

        Gate::define('notAuth', function (?User $user) {
            if (empty($user)) {
                return Response::allow();
            }
            return Response::denyAsNotFound();
        });

        Gate::before(function ($user, $ability) {
            if ($user->isAdmin() and !in_array($ability, ['notAuth', 'privilege', 'like'])) {
                return true;
            }
        });

//        ResetPassword::createUrlUsing(function ($user, string $token) {
//            return 'https://monserveur.com/reset-password?token='.$token;
//        });
    }
}
