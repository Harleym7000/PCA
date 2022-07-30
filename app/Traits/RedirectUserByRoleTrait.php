<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

trait RedirectUserByRoleTrait {

    public function redirectOnLogin()
    {
        $user = Auth::user();

        if($user->hasRoles('Admin')) {
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        } elseif($user->hasRoles('Event Manager')) {
            return redirect()->intended(RouteServiceProvider::EVENT_MANAGER_HOME);
        } elseif($user->hasRoles('Author')) {
            return redirect()->intended(RouteServiceProvider::AUTHOR_HOME);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
?>
