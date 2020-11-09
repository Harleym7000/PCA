<?php

namespace App\Http\Controllers\Events;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\News;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Event Management';
        $events = Event::paginate(5);
        $orgs = DB::table('events')
        ->select('managed_by', 'title')
        ->groupBy('managed_by')
        ->get();
        return view('events.index')->with([
            'title' => $title,
            'events' => $events,
            'orgs' => $orgs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/event_images', $filenameToStore);
        } else {
            $filenameToStore = 'pcaLogo.png';
        }

        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->venue = $request->input('location');
        $event->image = $filenameToStore;
        $event->managed_by = $request->input('managed_by');
        $event->approved = 1;

        if($event->save()) {
            return redirect('/event-manager/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/event_images', $filenameToStore);
        }

        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->description = $request->input('desc');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->venue = $request->input('venue');
        if($request->hasFile('image')) {
            $event->image = $filenameToStore;
        }
        $event->managed_by = $request->input('organiser');

        if($event->save()) {
            return redirect('/event-manager/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $eventID = $request->eid;

        $deleteGuestEventRegs = DB::table('guest_event_registrations')
        ->where('event_id', $eventID)
        ->delete();

        $deleteUserEventRegs = DB::table('user_event_registrations')
        ->where('event_id', $eventID)
        ->delete();

        $deleteEvent = DB::table('events')
        ->where('id', $eventID)
        ->delete();


        if($deleteEvent) {
            $request->session()->flash('success', 'The event was deleted successfully');
            return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error deleting this event. Please try again later');
            return redirect()->back();
        }
        

    public function registerEventUser(Request $request) 
    {
        $userID = $_POST['UID'];
        $eventID = $_POST['EID'];

        $regQuery = DB::table('user_event_registrations')
        ->where('user_id', '=', $userID)
        ->where('event_id', '=', $eventID)
        ->get();

        $regExists = count($regQuery);

        if($regExists > 0) {
            $request->session()->flash('error', 'You have already registered for this event. You can view this under the My Events Section of your account');
        return redirect()->back();
        } else {
            DB::table('user_event_registrations')
            ->insert(['user_id' => $userID, 'event_id' => $eventID]);
    
            $request->session()->flash('success', 'You have successfully registered for this event. You can view this under the My Events Section of your account');
            return redirect()->back();
        }
    }

    public function register(Request $request)
    {
        $forename = $request->input('forename');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $eventID = $request->input('eventID');

        DB::table('guest_event_registrations')
        ->insert(['event_id' => $eventID, 
                  'forename' => $forename, 
                  'surname' => $surname, 
                  'email' => $email, 
                  'contact_no' => $phone
                  ]);

        $request->session()->flash('success', 'You have been successfully registered for this event.');
        return redirect()->back();
    }
}
