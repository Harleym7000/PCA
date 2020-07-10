<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('Admin')) {
            $id = Auth::user()->id;
            $current_date_time = Carbon::now('Europe/London')->toDateTimeString();
            User::find($id);
            DB::table('users')
            ->where('id', '=', $id)
            ->update(['logged_in' => 1, 'time_logged_in' => $current_date_time]);
            $this->redirectTo = route('admin.users.index');

            return $this->redirectTo;
        }

        if(Auth::user()->hasRole('Event Manager')) {
            $id = Auth::user()->id;
            User::find($id);
            DB::table('users')
            ->where('id', '=', $id)
            ->update(['logged_in' => 1]);
            $this->redirectTo = '/event-manager/index';

            return $this->redirectTo;
        }

        if(Auth::user()->hasRole('Registered Interest')) {
            $id = Auth::user()->id;
            User::find($id);
            DB::table('users')
            ->where('id', '=', $id)
            ->update(['logged_in' => 1]);
            $this->redirectTo = '/interest';

            return $this->redirectTo;
        }

        if(Auth::user()->hasRole('Committee Member')) {
            $id = Auth::user()->id;
            User::find($id);
            DB::table('users')
            ->where('id', '=', $id)
            ->update(['logged_in' => 1]);
            $this->redirectTo = '/home';

            return $this->redirectTo;
        }
        
    }

    public function logout() {
        $id = Auth::user()->id;
        DB::table('users')
        ->where('id', '=', $id)
        ->update(['logged_in' => 0]);
        Auth::logout();
        return redirect('/');
    }
}
