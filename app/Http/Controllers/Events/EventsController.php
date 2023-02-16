<?php

namespace App\Http\Controllers\Events;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\User;
use App\News;
use App\Rules\Name_Validation;
use App\Rules\Phone_Vaidation;
use App\Rules\Script_Validation;
use Carbon\Carbon;
use Faker\Guesser\Name;

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

        //dd($request);
        $validatedData = $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'desc' => ['required', 'min:8', 'max:255'],
            'start_date' => ['required', 'date_format:Y-m-d', 'after:yesterday'],
            'end_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:start_date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'location' => ['required'],
            'admission' => ['required'],
            'capacity' => ['required', 'numeric'],
            'org' => 'required',
            'main_image' => ['required', 'max:2048'],
        ],
        $messages = [
            'title.required' => 'Please provide an event title',
            'desc.required' => 'Please provide an event description',
            'start_date.required' => 'Please provide a start date for this event',
            'start_date.date_format' => 'Please provide a start date in the format dd/mm/yyyy',
            'start_date.after' => 'The event cannot be before today',
            'start_time.required' => 'Please provide a start time for this event',
            'start_time.date_format' => 'Please provide a start time in the format hh:mm',
            'end_date.required' => 'Please provide an end date for this event',
            'end_date.date_format' => 'Please provide an end date in the format dd/mm/yyyy',
            'end_date.after' => 'The event cannot end before the start date selected',
            'end_time.required' => 'Please provide an end time for this event',
            'end_time.date_format' => 'Please provide an end time in the format hh:mm',
            'location.required' => 'Please provide a venue for this event',
            'admission.required' => 'Please provide an entry fee for this event',
            'capacity.required' => 'Please provide the total capacity for this event',
            'capacity.numeric' => 'The total capacity must be a number',
            'org.required' => 'Please provide who the event Organiser is (PCA or other)',
            'main_image.required' => 'Please provide an image for this event',
            'main_image.max' => 'The maximum file size for image uploads is 2MB. Please upload an image that is less than 2MB'
            ]);


        if($request->hasFile('main_image')) {
            $filenameWithExt = $request->file('main_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('main_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('main_image')->storeAs('public/event_images', $filenameToStore);
        } else {
            $filenameToStore = 'pcaLogo.png';
        }

        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('desc');
        $event->start_date = $request->input('start_date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->end_date = $request->input('end_date');
        $event->venue = $request->input('location');
        $event->admission = $request->input('admission');
        $event->spaces_left = $request->input('capacity');
        $event->image = $filenameToStore;
        $event->managed_by = $request->input('org');
        if($request->has('eventbrite')) {
            $event->is_eventbrite = 1;
        } else {
            $event->is_eventbrite = 0;
        }
        if($request->has('eventbrite_link')) {
            $event->eventbrite_link = $request->input('eventbrite_link');
        } else {
            $event->eventbrite_link = "";
        }
        $userID = Auth::user()->id;
        if($userID === 34) {
            $event->approved = 1;
            $event->save();
            $request->session()->flash('success', 'The event was created successfully. You can now view your event on the site');
            return redirect()->back();
        } else {
            $event->approved = 0;
        }

        $event->save();

        if($event->save()) {
            $request->session()->flash('success', 'The event was created successfully and is pending approval. Your event will appear on the site once it has been approved');
            return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error creating the event. Please try again.');
            return redirect()->back();
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

    public function showRegistered($id)
    {
        $eventID = $id;

        $eventTitle = DB::table('events')
        ->where('id', $eventID)
        ->select('title')
        ->first();

        //dd($id);

        $guestReg = DB::table('guest_event_registrations')
        ->where('event_id', $eventID)
        ->get();

        $userReg = DB::table('user_event_registrations')
        ->join('profiles', 'profiles.user_id', '=', 'user_event_registrations.user_id')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->where('event_id', $eventID)
        ->select('firstname', 'surname', 'email', 'contact_no')
        ->get();

        return view('events.showRegistered')->with([
            'guestReg' => $guestReg,
            'userReg' => $userReg,
            'eventTitle' => $eventTitle
        ]);

        //dd($userReg);
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

        $validatedData = $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'desc' => ['required', 'min:8', 'max:255'],
            'start_date' => ['required', 'date_format:Y-m-d'],
            'end_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:start_date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'location' => ['required'],
            'admission' => ['required'],
            'capacity' => ['required', 'numeric'],
            'org' => 'required',
            'main_image' => ['max:2048'],
        ],
        $messages = [
            'title.required' => 'Please provide an event title',
            'desc.required' => 'Please provide an event description',
            'start_date.required' => 'Please provide a start date for this event',
            'start_date.date_format' => 'Please provide a start date in the format dd/mm/yyyy',
            'start_date.after' => 'The event cannot be before today',
            'start_time.required' => 'Please provide a start time for this event',
            'start_time.date_format' => 'Please provide a start time in the format hh:mm',
            'end_date.required' => 'Please provide an end date for this event',
            'end_date.date_format' => 'Please provide an end date in the format dd/mm/yyyy',
            'end_date.after' => 'The event end date cannot be before the event start date',
            'end_time.required' => 'Please provide an end time for this event',
            'end_time.date_format' => 'Please provide an end time in the format hh:mm',
            'location.required' => 'Please provide a venue for this event',
            'admission.required' => 'Please provide an entry fee for this event',
            'capacity.required' => 'Please provide the total capacity for this event',
            'capacity.numeric' => 'The total capacity must be a number',
            'org.required' => 'Please provide who the event Organiser is (PCA or other)',
            'main_image.max' => 'The maximum file size for image uploads is 2MB. Please upload an image that is less than 2MB'
            ]);

        if($request->hasFile('main_image')) {
            $filenameWithExt = $request->file('main_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('main_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('main_image')->storeAs('public/event_images', $filenameToStore);
        }

        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->description = $request->input('desc');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->venue = $request->input('location');
        $event->admission = $request->input('admission');
        $event->spaces_left = $request->input('capacity');
        if($request->has('eventbrite')) {
            $event->is_eventbrite = 1;
        }
        if($request->hasFile('main_image')) {
            $event->image = $filenameToStore;
        }
        $event->managed_by = $request->input('org');
        if($request->has('eventbrite_link')) {
            $event->eventbrite_link = $request->input('eventbrite_link');
        }

        if($event->save()) {
            $request->session()->flash('success', 'The event was updated successfully');
            return redirect()->back();
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

        $deleteEventImages = DB::table('event_images')
        ->where('event_id', $eventID)
        ->delete();

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

        $eventName = Event::find($eventID)->get('title');

        $eventFull = DB::table('events')
        ->where('id', $eventID)
        ->where('spaces_left', '<=', 0)
        ->get();

        if(count($eventFull) > 0) {
            $request->session()->flash('error', 'Sorry, this event is full');
                    return redirect()->back();
        }

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

            DB::table('events')
            ->where('id', $eventID)
            ->decrement('spaces_left');

            $request->session()->flash('success', 'You have successfully registered for this event. You can view this under the My Events Section of your account');

            \Mail::send('email.eventConfirmUser', [
                    'body' => 'You are receiving this email as you wish to register for '.$eventName,
                ], function ($mail) use ($request) {
                    $mail->from(env('MAIL_FROM_ADDRESS'), 'PCA Event Registation');
                    $mail->to($request->email)->subject('PCA Event Registration');
                });
                if( count(\Mail::failures()) > 0) {
                    $request->session()->flash('error', 'Something went wrong');
                    return redirect()->back();
                    }

            return redirect()->back();


        }
    }

    // public function register(Request $request)
    // {
    //     $forename = $request->input('forename');
    //     $surname = $request->input('surname');
    //     $email = $request->input('email');
    //     $phone = $request->input('phone');
    //     $eventID = $request->input('eventID');

    //     DB::table('guest_event_registrations')
    //     ->insert(['event_id' => $eventID,
    //               'forename' => $forename,
    //               'surname' => $surname,
    //               'email' => $email,
    //               'contact_no' => $phone
    //               ]);

    //     $request->session()->flash('success', 'You have been successfully registered for this event.');
    //     return redirect()->back();
    // }

    public function addwidget()
    {
        return view('events.insertEvent');
    }

    public function insertwidget(Request $request)
    {
        $code = $request->widget;

        DB::table('ebwidgets')
        ->insert(['widget' => $code]);

        return redirect()->back();
    }

    public function showUploadImages($eventID)
    {
        $event = Event::find($eventID);
        //dd($eventID);
        $getCurrentImages = DB::table('event_images')
            ->where('event_id', $eventID)
            ->select('id', 'image_path');

            $currentImages = $getCurrentImages->get();

        return view('events.uploadImages')->with([
            'event' => $event,
            'currentImages' => $currentImages
            ]);
    }

    public function uploadImages(Request $request, $eventID)
    {
        // if($request->has('file')) {
        //     dd('yes');
        // }
        // else dd('no');
            //dd($eventID);

        $validatedData = $request->validate([
            'file' => 'required|max:2048'
        ],
        $messages = [
            'file.required' => 'Please select a file or files to upload',
            'file.max' => 'Your image file size is too big. Please do not upload images larger than 2MB in size',
            'file.image' => 'Your file format is invalid. Please only upload image files'
            ]);

            $fileTypes = ['png', 'jpg', 'jfif', 'jpeg', 'tiff'];

            if($request->hasFile('file')) {
                $processed = 0;
        foreach($request->file as $file) {

            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            //dd($ext);
            if(!in_array($ext, $fileTypes)) {
                $request->session()->flash('error', 'One or more files is not an image. Please only upload image files');
        return redirect()->back();
            }
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $file->storeAs('public/event_images', $filenameToStore);

                DB::table('event_images')
                ->insert(['event_id' => $eventID, 'image_path' => $filenameToStore]);
    }
    $processed = 1;
}
    if($processed === 1) {
        $request->session()->flash('success', 'Images have been uploaded successfully');
        return redirect()->back();
    }
    $request->session()->flash('error', 'Images could not be uploaded successfully');
        return redirect()->back();
}

public function deleteImages(Request $request)
{
      $imageID = $request->id;

      $deleteImage = DB::table('event_images')
      ->where('id', $imageID)
      ->delete();

      $request->session()->flash('success', 'The image was deleted successfully');
        return redirect()->back();
}

public function searchEvents(Request $request) {
    $eventSearch = $request->search;

    //dd($eventSearch);

    $events = DB::table('events')
    ->where('title', 'like', '%'.$eventSearch.'%')
    ->paginate(5);

    return view('events.index')->with('events', $events);
}
}
