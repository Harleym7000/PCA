<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Rules\Name_Validation;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Rules\Script_Validation;
use App\Rules\Postcode_Validation;
use App\Rules\Phone_Vaidation;

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
        return view('auth.register')->with('causes', $causes);
    }

    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'forename' => ['required', 'max:255', 'min:2', new Script_Validation, new Name_Validation],
            'surname' => ['required', 'max:255', 'min:2', new Script_Validation, new Name_Validation],
            'address' => ['required', 'min:8', 'max:255', new Script_Validation],
            'town' => ['required', 'min:2', 'max:255', new Script_Validation],
            'postcode' => ['required', 'min:7', 'max:8', new Script_Validation, new Postcode_Validation],
            'tel_no' => ['min:11', 'max:11', new Script_Validation, new Phone_Vaidation],
            'mob_no' => ['min:11', 'max:11', new Script_Validation, new Phone_Vaidation],
            'email' => ['required', 'email', 'max:255', new Script_Validation],
            'password' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/', 'confirmed', new Script_Validation],
            'password_confirmation' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/', new Script_Validation],
            'causes.*' => [new Script_Validation]
        ],
        $messages = [
            'password.regex' => 'Passwords must contaain at least 1 capital letter, 1 number and 1 special character (e.g. @#!?%)',
            'password.confirmed' => 'Passwords do not match'
        ]);

        $userpass = request('password');
        $userconfpass = request('password_confirmation');

        if($userpass === $userconfpass) {

        $user = new User();
        $role = Role::where('name', 'Committee Member')->first();

        $user->firstname = request('forename');
        $user->surname = request('surname');
        $user->address = request('address');
        $user->town = request('town');
        $user->postcode = request('postcode');
        $user->tel_no = request('tel_no');
        $user->mob_no = request('mob_no');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->save();

        $userId = $user->id;
        $causes = request('causes');
        if($causes) {
        foreach($causes as $cause) {
            $causeID = $cause;
            DB::table('cause_user')->insert([
                'user_id' => $userId,
                'cause_id' => $causeID
            ]);
        }
    }

        $user->attachRole($role);
        $this->guard()->logout();
        return view('auth.login');
    }
    else {
        $causes = DB::table('causes')->get();
        $request->session()->flash('error', 'Error: Passwords do not match');
        return redirect()->back()->withInput($request->except('password'));
} 
}
}
