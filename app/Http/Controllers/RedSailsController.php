<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedSailsController extends Controller
{
    public function index() {
        $festivals = DB::table('red_sails_festivals')->get();
        return view('redsails.index')->with('festivals',$festivals);
    }

    public function addNewFestival(Request $request) {
        $year = $request->festivalYear;
        $start_date = $request->startDate;
        $end_date = $request->endDate;

        $storeFestival = DB::table('red_sails_festivals')->insert([
            'year' => $year,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        if($storeFestival) {
            $request->session()->flash('success', 'The festival was created successfully. You can now add a programme to this festival, or edit the festival dates at any time.');
            return redirect()->back();
        }
    }

    public function deleteFestival(Request $request, $id) {
        $deleteFestival = DB::table('red_sails_festivals')
                          ->where('id',$id)
                          ->delete();

        if($deleteFestival) {
            $request->session()->flash('success', 'The festival was deleted successfully.');
            return redirect()->back();
        }
    }
}
