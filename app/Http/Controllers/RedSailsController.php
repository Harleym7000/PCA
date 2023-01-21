<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonPeriod;

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

        $festivals = DB::table('red_sails_festivals')->get();

        // foreach($festivals as $f) {
        //     if($f->year === (int)$year) {
        //         $request->session()->flash('error', 'Error: A festival for this year already exists. You can view and edit this festival at any time.');
        //         return redirect()->back();
        //     }
        // }

        $storeFestival = DB::table('red_sails_festivals')->insert([
            'year' => $year,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        if($storeFestival) {
            $request->session()->flash('success', 'The festival was created successfully. You can now add a programme to this festival, or edit the festival dates at any time.');
            $festivalID = DB::getPdo()->lastInsertId();
            $festival = DB::table('red_sails_festivals')
                        ->where('id', $festivalID)
                        ->get();
            $festivalDates;

            foreach($festival as $f) {
                $festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
            }

            return view('redsails.programme')->with([
                'festival' => $festival,
                'festivalDates' => $festivalDates
                ]);
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

    public function addFestivalProgramme($id) {
        $festival = DB::table('red_sails_festivals')
                    ->where('id', $id)
                    ->get();

        foreach($festival as $f) {
            $festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
        }

        return view('redsails.programme')->with([
            'festival' => $festival,
            'festivalDates' => $festivalDates
        ]);
    }

    public function addProgramme($id, Request $request) {
        $festivalDay = $request->festivalDay;
        $time = strtotime($request->festivalDay);
        $date = date('Y-m-d',$time);
        //dd($date);
        $programme = $request->input('programme');

        $addProgramme = DB::table('festival_programme')->insert([
            'festival_id' => $id,
            'festival_date' => $date,
            'programme' => $programme
        ]);

        if($addProgramme) {
            $festival = DB::table('red_sails_festivals')
                        ->where('id',$id)
                        ->get();

        foreach($festival as $f) {
            $festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
        }

            $request->session()->flash('success', 'The programme for '.$festivalDay.' was added successfully. You may complete this form again to add a programme for the other festival days');
            return view('redsails.programme')->with([
                'festival' => $festival,
                'festivalDates' => $festivalDates
            ]);
        }
    }

    public function showFestivalOverview() {
        $year = date("Y");
        $festivalExistsQuery = DB::table('red_sails_festivals')
                                 ->where('year',$year)
                                 ->get();

        $festivalExists = 0;
        if(count($festivalExistsQuery) === 1) {
            $festivalExists = 1;
            foreach($festivalExistsQuery as $f) {
                $festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
            }
            return view('pages.redSails')->with([
                'festivalExists' => $festivalExists,
                'festivalExistsQuery' => $festivalExistsQuery,
                'festivalDates' => $festivalDates
            ]);
        }
        return view('pages.redSails')->with('festivalExists',$festivalExists);
    }

    public function showProgrammeForDay($festivalDate) {
        $programme = DB::table('red_sails_festivals')
                     ->join('festival_programme', 'red_sails_festivals.id', '=', 'festival_programme.festival_id')
                     ->where('festival_date', $festivalDate)
                     ->get();

                     $year = date("Y");
                     $festivalExistsQuery = DB::table('red_sails_festivals')
                                              ->where('year',$year)
                                              ->get();

                     if(count($festivalExistsQuery) === 1) {
                         foreach($festivalExistsQuery as $f) {
                             $festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
                         }

        $programmeExists = 0;
        if(count($programme) > 0) {
            $programmeExists = 1;
        return view('pages.showRedSailsProgramme')->with([
            'programme' => $programme,
            'festivalDates' => $festivalDates,
            'programmeExists' => $programmeExists,
        ]);
    } else {
        return view('pages.showRedSailsProgramme')->with([
            'festivalDates' => $festivalDates,
            'programmeExists' => $programmeExists,
        ]);
    }
    }
}

public function editFestivalProgramme($id) {
    $getFestivalProgramme = DB::table('red_sails_festivals')
                            ->join('festival_programme', 'red_sails_festivals.id', '=', 'festival_programme.festival_id')
                            ->where('id', $id)
                            ->orderBy('festival_date', 'asc')
                            ->get();
    //dd($getFestivalProgramme);

    return view('redsails.selectProgrammeToEdit')->with('getFestivalProgramme',$getFestivalProgramme);
}

public function showEditProgramme($id) {
    $getFestivalProgramme = DB::table('red_sails_festivals')
                            ->join('festival_programme', 'red_sails_festivals.id', '=', 'festival_programme.festival_id')
                            ->where('programme_id', $id)
                            ->get();
    $festivalID;
    foreach($getFestivalProgramme as $gfp) {
        $festivalID = $gfp->id;
    }

    $festival = DB::table('red_sails_festivals')
    ->where('id', $festivalID)
    ->get();
$festivalDates;

foreach($festival as $f) {
$festivalDates = CarbonPeriod::create($f->start_date, $f->end_date);
}
    return view('redsails.editProgramme')->with([
        'getFestivalProgramme' => $getFestivalProgramme,
        'festivalDates' => $festivalDates
    ]);
}

    public function updateProgramme($id, Request $request) {
        $updateProgramme = DB::table('festival_programme')
                 ->where('programme_id', $id)
                 ->update([
                    'festival_date' => $request->festivalDay,
                    'programme' => $request->programme
                 ]);

        if($updateProgramme) {
            $request->session()->flash('success', 'The programme was updated successfully.');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Error: The programme was not updated. Please try again');
            return redirect()->back();
        }
        }

        // public function addToExistingProgramme($id) {
        //     $festival = DB::table('red_sails_festivals')
        //                 ->where('id',$id)
        //                 ->get();
        //     return view('redsails.programme')->with('festival',$festival);
        // }
        }
