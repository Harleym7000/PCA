<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

        protected function authenticated(Request $request, $user)
        {
                $userID = Auth::user()->id;
                $query = DB::table('users')
                ->select('profile_set')
                ->where('users.id', $userID)->first();
                if($query->profile_set == 0) {
                    return redirect('/user/profile/create');
                }

            if($user->hasRole('Admin')) {
                return redirect('/admin/dashboard');
            }
            if($user->hasRole('Event Manager')) {
                return redirect('/event-manager/index');
            }
            if($user->hasRole('Member')) {
                return redirect('/user/events');
            }
            if($user->hasRole('Author')) {
                return redirect('/author');
            }
        }

        protected function index()
        {
            return view('auth.login');
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
         Auth::logout();
         return redirect('/');
    }
}
