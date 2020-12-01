<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use App\Rules\Name_Validation;
use App\Rules\Phone_Validation;
use App\Rules\Postcode_Validation;
use App\Rules\Script_Validation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                if($query->profile_set == 1) {
                    return redirect('/user/profile');
                }
             else {
            return view('user.createProfile')->with('userEmail', $userEmail);
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
        if($query->profile_set == 0) {
            return view('user.createProfile')->with('userEmail', $userEmail);
        }
        $profileInfo = DB::table('profiles')
        ->where('profiles.user_id', $userID)
        ->first();
        $userEmailQuery = DB::table('users')
        ->where('users.id', $userID)
        ->select('email')->first();
        $userEmail = $userEmailQuery->email;
        return view('user.profile')->with(['profileInfo' => $profileInfo, 'userEmail' => $userEmail]);
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

        $vaildateProfile = $request->validate([
            'firstname' => ['required', new Script_Validation, new Name_Validation],
            'surname' => ['required', new Script_Validation, new Name_Validation]
        ],
        $messages = [
            'firstname.required' => 'Please provide your first name',
            'surname.required'=> 'Please provide your surname'
        ]);
        $userID = Auth::user()->id;
        $firstname = $request->firstname;
        $surname = $request->surname;
        $address = $request->address;
        $town = $request->town;
        $postcode = $request->postcode;
        $contact_no = $request->contact_no;
        $email = $request->email;

        $createProfile = DB::table('profiles')
        ->insert( 
            ['user_id' => $userID, 'firstname' => $firstname, 'surname' => $surname, 'address' => $address, 'town' => $town, 'postcode' => $postcode, 'contact_no' => $contact_no]
        );

        DB::table('users')
        ->where('users.id', $userID)
        ->update(['email' => $email, 'profile_set' => 1]);



        if($createProfile) {
            $request->session()->flash('success', ' Your profile was created successfully');
            return redirect('/member');
        }
            $request->session()->flash('error', 'There was an error creating your profile');
            return redirect()->back();
    }

    public function updateProfile(Request $request) {
        $vaildateProfile = $request->validate([
            'firstname' => ['required', new Script_Validation, new Name_Validation],
            'surname' => ['required', new Script_Validation, new Name_Validation],
            'address' => ['required', new Script_Validation, 'regex:/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/'],
            'town' => ['required', new Script_Validation],
            'postcode' => ['required', new Script_Validation, new Postcode_Validation],
            'tel_no' => new Phone_Validation, new Script_Validation,
            'email' => 'required', 'email', new Script_Validation
        ],
        $messages = [
            'firstname.required' => 'First name was not updated as this field is required',
            'surname.required' => 'Surname was not updated as this field is required',
            'address.required' => 'Address was not updated as this field is required',
            'address.regex' => 'Invalid address format',
            'town.required' => 'Town was not updated as this field is required',
            'postcode.required' => 'Postcode was not updated as this field is required',
            'tel_no.required' => 'Contact Number was not updated as this field is required',
            'email.required' => 'Email was not updated as this field is required'

        ]);

        $userID = Auth::user()->id;
        $firstname = $request->firstname;
        $surname = $request->surname;
        $address = $request->address;
        $town = $request->town;
        $postcode = $request->postcode;
        $contact_no = $request->contact_no;
        $email = $request->email;

        $updateProfile = DB::table('profiles')
        ->where('user_id', $userID)
        ->update(['firstname' => $firstname, 'surname' => $surname, 'address' => $address, 'town'  => $town, 'postcode' => $postcode, 'contact_no' => $contact_no]);

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
        return view('user.settings');
    }

    public function events() {
        $userID = Auth::user()->id;
        $events = DB::table('user_event_registrations')->
        join('events', 'user_event_registrations.event_id', '=', 'events.id')->
        select('events.id', 'events.title', 'events.date', 'events.time', 'events.venue', 'events.image')->
        where('user_event_registrations.user_id', '=', $userID)->
        get();

        return view('user.events')->with('events', $events);
    }

    public function showCommittees($id)
    {
        $causes = DB::table('causes')
        ->get();

        $user = User::find($id);

        DB::table('cause_user')
        ->where('user_id', $id)
        ->get();

        return view('user.committees')->with([
            'causes' => $causes,
            'user' => $user
            ]);
    }
}
