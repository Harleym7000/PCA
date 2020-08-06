<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Cause;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'forename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'tel_no' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function index() 
    {
        $causes = DB::table('causes')->get();
        return view('auth.register', compact('causes'));
    }

    protected function create(Request $data)
    {

        $role = Role::where('name', 'Registered Interest')->first();

        $user = new User();

        $user->firstname = request('forename');
        $user->surname = request('surname');
        $user->address = request('address');
        $user->town = request('town');
        $user->postcode = request('postcode');
        $user->tel_no = request('tel_no');
        $user->mob_no = request('mob_no');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->causes = request('causes');

        $user->save();

            // 'firstname' => $data['forename'],
            // 'surname' => $data['surname'],
            // 'address' => $data['address'],
            // 'town' => $data['town'],
            // 'postcode' => $data['postcode'],
            // 'tel_no' => $data['tel_no'],
            // 'mob_no' => $data['mob_no'],
            // 'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            // 'causes' => $data['causes']

        $user->assignRole($role);

        $this->guard()->logout();

        return view('auth.login');
    }
}
