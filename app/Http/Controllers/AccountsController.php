<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use App\Rules\Address_validation;
use App\Rules\Name_Validation;
use App\Rules\Phone_Validation;
use App\Rules\Postcode_Validation;
use App\Rules\Script_Validation;
use App\Rules\Email_Validation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function createProfile() {
        $userID = Auth::user()->id;
                $query = DB::table('users')
                ->select('profile_set')
                ->where('users.id', $userID)->first();
        $query2 = DB::table('users')
        ->select('email')
        ->where('users.id', $userID)->first();
        $userEmail = $query2->email;
        $titles = DB::table('titles')
        ->get();
                if($query->profile_set == 1) {
                    return redirect('/user/profile');
                }
             else {
            return view('user.createProfile')->with(['userEmail' => $userEmail, 'userID' => $userID,
                'titles' => $titles]);
        }
    }

    public function profile() {
        $userID = Auth::user()->id;
        $query = DB::table('users')
        ->where('users.id', $userID)
        ->first();
        $query2 = DB::table('users')
        ->select('email')
        ->where('users.id', $userID)->first();
        $userEmail = $query2->email;
        $titles = DB::table('titles')
        ->get();
        if($query->profile_set == 0) {
            return view('user.createProfile')->with(['userEmail' => $userEmail, 'userID' => $userID,
                'titles => $titles']);
        }
        $profileInfo = DB::table('profiles')
        ->where('profiles.user_id', $userID)
        ->first();
        $userEmailQuery = DB::table('users')
        ->where('users.id', $userID)
        ->select('email')->first();
        $userEmail = $userEmailQuery->email;
        return view('user.profile')->with(['profileInfo' => $profileInfo, 'userEmail' => $userEmail, 'userID' => $userID, 'titles' => $titles]);
    }

    public function cancelReg(Request $request, $id)
    {
        $eventID = $id;
        $userID = Auth::user()->id;

        DB::table('user_event_registrations')->
        where('user_event_registrations.event_id', '=', $eventID)->
        where('user_event_registrations.user_id', '=', $userID)->
        delete();

        $request->session()->flash('success', ' You have successfully cancelled your registration for this event');
        return redirect()->back();
    }

    public function storeProfile(Request $request) {

        $validatedData = $request->validate([
            'email' => ['email', 'min:8', 'max:255', new Script_Validation, new Email_Validation],
        ],
        $messages = [
            'email.unique' => 'A user with the email address '.$request->email.' already exists',
            ]);

        $userID = Auth::user()->id;

        $signUpEmail = DB::table('users')
        ->where('id', $userID)
        ->select('email')
        ->get();
        if(Str::of($signUpEmail)->exactly($request->email)) {
            $request->session()->flash('error', 'Your email must be your sign-up email address. If you need to change this, you can do so after creating your profile');
        return redirect()->back();
        }
        $title = Crypt::encrypt($request->title);
        $firstname = Crypt::encrypt($request->firstname);
        $middlename = Crypt::encrypt($request->middlename);
        $surname = Crypt::encrypt($request->surname);
        $address = Crypt::encrypt($request->address);
        $town = Crypt::encrypt($request->town);
        $postcode = Crypt::encrypt($request->postcode);
        $contact_no = Crypt::encrypt($request->contact_no);
        $email = $request->email;

        $createProfile = DB::table('profiles')
        ->insert(
            ['user_id' => $userID, 'title' => $title, 'firstname' => $firstname, 'middlename' => $middlename, 'surname' => $surname, 'address' => $address, 'town' => $town, 'postcode' => $postcode, 'contact_no' => $contact_no]
        );

        DB::table('users')
        ->where('users.id', $userID)
        ->update(['email' => $email, 'profile_set' => 1]);



        if($createProfile) {
            $request->session()->flash('success', ' Your profile was created successfully');
            return redirect()->back();
        }
            $request->session()->flash('error', 'There was an error creating your profile');
            return redirect()->back();
    }

    public function updateProfile(Request $request) {
        $vaildateProfile = $request->validate([
            'title' => ['required'],
            'firstname' => ['required', new Script_Validation, new Name_Validation],
            'middlename' => [new Script_Validation],
            'surname' => ['required', new Script_Validation, new Name_Validation],
            'address' => 'required',
            'town' => ['required', new Script_Validation],
            'postcode' => ['required', new Script_Validation, new Postcode_Validation],
            'contact_no' => new Phone_Validation, new Script_Validation,
            'email' => 'required', 'email', new Script_Validation
        ],
        $messages = [
            'firstname.required' => 'First name was not updated as this field is required',
            'surname.required' => 'Surname was not updated as this field is required',
            'address.required' => 'Address was not updated as this field is required',
            'address.regex' => 'Please provide a valid address',
            'town.required' => 'Town was not updated as this field is required',
            'postcode.required' => 'Postcode was not updated as this field is required',
            'email.required' => 'Email was not updated as this field is required'
        ]);

        $userID = Auth::user()->id;
        $title = Crypt::encrypt($request->title);
        $firstname = Crypt::encrypt($request->firstname);
        $middlename = Crypt::encrypt($request->middlename);
        $surname = Crypt::encrypt($request->surname);
        $address = Crypt::encrypt($request->address);
        $town = Crypt::encrypt($request->town);
        $postcode = Crypt::encrypt($request->postcode);
        $contact_no = Crypt::encrypt($request->contact_no);
        $email = $request->email;

        $updateProfile = DB::table('profiles')
        ->where('user_id', $userID)
        ->update(['title'=> $title, 'firstname' => $firstname, 'middlename' => $middlename, 'surname' => $surname, 'address' => $address, 'town'  => $town, 'postcode' => $postcode, 'contact_no' => $contact_no]);

        $updateEmail = DB::table('users')
        ->where('id', $userID)
        ->update(['email' => $email]);

        if($updateProfile) {
                $request->session()->flash('success', ' Your profile was updated successfully');
                return redirect()->back();
        }

        if($updateEmail) {
            $request->session()->flash('success', ' Your email was updated successfully');
                return redirect()->back();
        }

        $request->session()->flash('error', ' There was an error updating your profile. Please try again');
            return redirect()->back();
    }

    public function settings($id) {
        return view('user.settings')->with('id', $id);
    }

    public function events() {
        $userID = Auth::user()->id;
        $events = DB::table('user_event_registrations')->
        join('events', 'user_event_registrations.event_id', '=', 'events.id')->
        select('events.id', 'events.title', 'events.start_date', 'events.start_time', 'events.venue', 'events.image')->
        where('user_event_registrations.user_id', '=', $userID)->
        get();

        return view('user.events')->with('events', $events);
    }

    public function showCommittees($id)
    {
        $causes = DB::table('causes')
        ->get();

        $user = User::find($id);
        $uid = $user->id;

        DB::table('cause_user')
        ->where('user_id', $id)
        ->get();

        $profileInfo = DB::table('profiles')
        ->where('user_id', $uid)
        ->first();

        return view('user.committees')->with([
            'causes' => $causes,
            'user' => $user,
            'profileInfo' => $profileInfo
            ]);
    }

    public function deleteAccount($id)
    {
        $userID = $id;

        DB::table('user_event_registrations')
        ->where('user_id', $userID)
        ->delete();

        DB::table('user_reg')
        ->where('user_id', $userID)
        ->delete();

        DB::table('role_user')
        ->where('user_id', $userID)
        ->delete();

        DB::table('profiles')
        ->where('user_id', $userID)
        ->delete();

        DB::table('news')
        ->where('written_by', $userID)
        ->delete();

        DB::table('contact_response')
        ->where('respondee_user_id', $userID)
        ->delete();

        DB::table('cause_user')
        ->where('user_id', $userID)
        ->delete();

        DB::table('user_tokens')
        ->where('user_id', $userID)
        ->delete();

        DB::table('users')
        ->where('id', $userID)
        ->delete();

        return redirect('/');
    }
}
