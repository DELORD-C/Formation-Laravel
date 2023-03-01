<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\AuthPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class
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
            return empty($user);
        });

        Gate::before(function ($user, $ability) {
            if ($user->isAdmin() and !in_array($ability, ['notAuth', 'privilege'])) {
                return true;
            }
        });
    }
}
