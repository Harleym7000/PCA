<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
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
}
