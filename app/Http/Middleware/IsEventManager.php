<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsEventManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $authorised = 0;
        if(!Auth::check()) {
            return redirect('/login');
        } else {
        $userRoles = Auth::user()->roles();
        foreach($userRoles as $role) {
            if($user->hasRoles('Event Manager')) {
                $authorised = 1;
                return $next($request);
            }
        }
    }
        if($authorised == 0) {
            return redirect('/login');
        }
    }
}
