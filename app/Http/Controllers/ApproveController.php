<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{
    public function eventApplications()
    {
        $pendingEventApps = DB::table('events')
        ->where('approved', 0)
        ->get();

        return view('approvals.eventApps')->with(['pending' => $pendingEventApps]);
    }

    public function amendApp($id)
    {
        $event = DB::table('events')
        ->where('id', $id)
        ->get();

        return view('approvals.amendEventApp')->with(['event' => $event]);
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
