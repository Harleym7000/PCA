<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('manage-events', function($user){
            return $user->hasRole('event manager');
        });

        Gate::define('view-policy', function($user){
            return $user->hasRole('committee member');
        });

        Gate::define('manage-news', function($user){
            return $user->hasRole('author');
        });
    }
}
