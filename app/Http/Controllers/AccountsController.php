<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function profile() {

        $user = Auth::user();
        $causes = Cause::all();
        return view('user.profile')->with([
            'user' => $user,
            'causes' => $causes
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $causes = Cause::all();

        $user->firstname = request('firstname');
        $user->surname = request('surname');
        $user->address = request('address');
        $user->town = request('town');
        $user->postcode = request('postcode');
        $user->tel_no = request('tel_no');
        $user->mob_no = request('mob_no');
        $user->email = request('email');

        $user->causes()->sync($request->causes);

        if($user->save()) {

            $request->session()->flash('success', ' Your profile has been updated successfully');
            } else {
                $request->session()->flash('error', 'There was an error updating your profile');
            }
    
            return view('user.profile')->with([
                'user' => $user,
                'causes' => $causes
            ]);
    }

    public function settings($id) {
        return view('user.settings');
    }

    public function events() {
        $userID = Auth::user()->id;
        $events = DB::table('user_event_registrations')->
        join('events', 'user_event_registrations.event_id', '=', 'events.id')->
        select('events.title', 'events.date', 'events.time', 'events.venue', 'events.image')->
        where('user_event_registrations.user_id', '=', $userID)->
        get();

        return view('user.events')->with('events', $events);
    }
}
