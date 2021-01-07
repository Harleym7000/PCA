<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Cause;
use App\Rules\Script_Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Mail\SendMail;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware(['auth', 'verified']);
     }

    public function index()
    {
        $title = 'User Management';
        $roles = Role::all();
        //$users = User::paginate(10);
        $users = User::where('profile_set', 1)->paginate(10);
        $causes = Cause::all();
        
        return view('admin.users.index')->with([
            'roles' => $roles,
            'users'=> $users,
            'title' => $title,
            'causes' => $causes
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create New User";
        $roles = Role::all()->except(6);
        return view('admin.users.create')->with([
            'roles' => $roles,
            'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //$passwords = $request->password.' '.$request->passwordCon;
        //dd($passwords);
        $validatedData = $request->validate([
            'email' => ['required', 'unique:users', 'email', 'min:8', 'max:255', new Script_Validation],
            'roles' => 'required'
        ],
        $messages = [
            'email.unique' => 'A user with the email address '.$request->email.' already exists',
            'roles.required' => 'Please select at least one role'
            ]);

        $user = new User;
        $user->email = $request->input('email');
        $userPass = $request->input('password');

        $userPassConf = $request->input('passwordCon');
        $userExistsQuery = DB::table('users')
        ->where('email', $user->email)
        ->get();
        $userExists = count($userExistsQuery);
        if($userExists > 0) {
            $request->session()->flash('error', 'Error: A user with this email address already exists');
            return redirect()->back();
        }
        if($userPass === $userPassConf) {
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->roles);
            $email = $request->input('email');
        \Mail::send('email.credentials', [
            'email' => $email,
            'password' => $userPass,
        ], function ($mail) use ($request) {
            $mail->from('harleymdev@gmail.com', 'PCA Accounts');
            $mail->to($request->email)->subject('PCA Account Credentials');
        });
            $title = 'User Management';
        $roles = Role::all();
        $users = User::paginate(10); 
        $request->session()->flash('success', 'New user created successfully');
        return redirect()->back();
        } else {
            $title = "Create New User";
        $roles = Role::all()->except(6);
        $request->session()->flash('error', 'Error: Passwords do not match');
        return view('admin.users.create')->with([
            'roles' => $roles,
            'title' => $title]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('manage-users')) {
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all()->except(6);
        $causes = Cause::all();
        $title = 'Edit Users';
        $user = User::find($id);

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'causes' => $causes,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        if($user->save()) {

        $request->session()->flash('success', 'The user has been updated successfully');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.users.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('manage-users')) {
            return redirect('admin.users.index');
        }

        DB::table('user_reg')
        ->where('user_id', $id)
        ->delete();

        $user = User::find($id);
        $user->roles()->detach();
        $user->causes()->detach();
        $user->profile()->delete();
        
        if($user->delete()) {
            $request->session()->flash('success', 'The user was deleted successfully');
        } else {
            $request->session()->flash('error', 'There was an error deleting the user. Please try again');
        }

        return redirect()->route('admin.users.index');
    }

    public function displayResetUserPassword() {
        return view('admin.users.resetPass');
    }

    public function resetUserPassword(Request $request, User $user) {

        $user = auth()->user();
        $oldPass = $request->current_password;
        //dd($oldPass);
        $validatePass = Hash::check($oldPass, $user->password);

        if($validatePass) {

        $pass = $request->input('password');
        $passConf = $request->input('passwordCon');

        if($pass === $passConf) {
            $userID = $user->id;
            $newPass = Hash::make($pass);
            DB::table('users')
            ->where('id', $userID)
            ->update(['password' => $newPass]);
            $request->session()->flash('success', 'Your password has been reset. You can now login using your new password');
        } else {
            $request->session()->flash('error', 'Your passwords did not match. Please try again');
        }
    } else {
        $request->session()->flash('error', 'Your current password is incorrect. Please try again');
    }
        return redirect()->back();
    }

    public function getUserCauses(Request $request) 
    {
        $user_id = $_POST['id'];
        $query = DB::table('user_causes')
        ->join('causes', 'user_causes.id', '=', 'causes.id')
        ->select('user_causes.user_id', 'user_causes.cause_id', 'causes.name AS cause')
        ->where('user_causes.user_id', '=', $user_id);

        $result = $query->get();

        return response()->json($result);
    }

    public function updateUserCauses(Request $request, $id)
    {
        $causes = $request->comms;
        $user = User::find($id);
        $user->causes()->sync($causes);

        if($user->save()) {

        $request->session()->flash('success', 'Your committees have been updated successfully');
        } else {
            $request->session()->flash('error', 'There was an error updating your committees');
        }
        return redirect()->back();
    }
}
