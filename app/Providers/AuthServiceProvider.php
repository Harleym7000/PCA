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
            return $user->hasRole('Admin');
        });

        Gate::define('manage-events', function($user){
            return $user->hasRole('Event Manager');
        });

        Gate::define('view-policy', function($user){
            return $user->hasRole('Member');
        });

        Gate::define('manage-news', function($user){
            return $user->hasRole('Author');
        });

        Gate::define('approve-events', function($user){
            return $user->hasRole('Event Approver');
        });
    }
}
