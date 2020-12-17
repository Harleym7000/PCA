<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Script_Validation;

class ApproveController extends Controller
{
    public function eventApplications()
    {
        $pendingEventApps = DB::table('events')
        ->where('approved', 0)
        ->get();

        return view('approvals.eventApps')->with(['pending' => $pendingEventApps]);
    }

    public function approveEvent(Request $request)
    {
       $id = $request->approveApp;
       //dd($id);

       $approveEvent = DB::table('events')
       ->where('id', $id)
       ->update(['approved' => 1]);

        if($approveEvent) {
            $request->session()->flash('success', 'The event application has been approved successfully. This event will now appear on the site');
            return redirect()->back();
        }
        $request->session()->flash('error', 'The event application was not approved successfully. This event will not appear on the site. Please try again');
            return redirect()->back();
    }

    public function amendApp($id)
    {
        //dd($id);
        $event = DB::table('events')
        ->where('id', $id)
        ->get();

        return view('approvals.amendEventApp')->with(['event' => $event]);
    }

    public function amendAppSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:events', 'max:255', new Script_Validation],
            'desc' => ['required', new Script_Validation],
            'date' => ['required', new Script_Validation],
            'time' => ['required', new Script_Validation],
            'venue' => ['required', 'max:255', new Script_Validation],
            'organiser' => ['required', 'max:255', new Script_Validation],
        ],
        $messages = [
            'title.required' => 'Please enter a name for your event',
            'title.unique' => 'An event with this name already exists. Please give your event a different name or check if it already exists',
            'desc.required' => 'Please provide a brief description of your event',
            'date.required' => 'Please provide a date for your event',
            'time.required' => 'Please provide a time for your event',
            'venue.required' => 'Please provide a venue for your event',
            'organiser.required' => 'Please state who is organising the event (PCA or other)'
            ]);

            $id = $request->amend;
            $title = $request->title;
            $desc = $request->desc;
            $date = $request->date;
            $time = $request->time;
            $venue = $request->venue;
            $organiser = $request->organiser;

            $amend = DB::table('events')
            ->where('id',$id)
            ->update([
                'title' => $title,
                'description' => $desc,
                'date' => $date,
                'time' => $time,
                'venue' => $venue,
                'managed_by' => $organiser,
                'approved' => 1
                ]);

                if($amend) {
                    $request->session()->flash('success', 'The event application has been updated and approved successfully. This event will now appear on the site with the new information you provided');
            return redirect()->back();
        }
        $request->session()->flash('error', 'The event application was not updated successfully. This event will not appear on the site. Please try again');
            return redirect()->back();
                }
    

    public function rejectApp(Request $request, $id)
    {

        DB::table('events')
        ->where('id', $id)
        ->delete();

        $request->session()->flash('success', 'The event was rejected and will no longer appear in the system');
            return redirect()->back();
    }
}
