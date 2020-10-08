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
            'g-recaptcha-response' => 'required|captcha',
            'email' => ['required', 'email', 'max:255', new Script_Validation],
            'password' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/', 'confirmed', new Script_Validation],
            'password_confirmation' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/', new Script_Validation]
        ],
        $messages = [
            'password.regex' => 'Passwords must contaain at least 1 capital letter, 1 number and 1 special character (e.g. @#!?%)',
            'password.confirmed' => 'Passwords do not match',
            'tel_no.regex' => 'Tel_No must only contain numerical charavters',
            'mob_no.regex' => 'Mob_No must only contain numerical characters'
        ]);

        $userpass = request('password');
        $userconfpass = request('password_confirmation');

        if($userpass === $userconfpass) {

        $user = new User();
        $role = Role::where('name', 'Committee Member')->first();
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->save();
        $user->attachRole($role);
        $this->guard()->logout();

        \Mail::send('email.verify-email', [

            'body' => 'Hello. You are receiving this email because you wish to register as a committee member for PCA. Great! We would love to have you on board. Before we continue, please verify your email address using the link below. If you did not register, we apologise for the inconvenience. Simply ignore this email and your data will be deleted after 24 hours.'
        ], function ($mail) use ($request) {
            $mail->from('harleymdev@gmail.com');
            $mail->to($request->email)->subject('Verify Email Address');
        });
        if( count(\Mail::failures()) > 0) {
        $request->session()->flash('error', 'Something went wrong');
        return view('auth.register');
        } elseif( count(\Mail::failures()) == 0){
        return view('auth.conf-email');
    } else {
        $request->session()->flash('error', 'Error: Passwords do not match');
        return redirect()->back()->withInput($request->except('password'));
    }
    }
} 
}