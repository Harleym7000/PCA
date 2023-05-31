<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\CarbonPeriod;
use App\Rules\Script_Validation;

class RedSailsController extends Controller
{
    public function index() {
        $festivals = DB::table('red_sails_festivals')->get();
        return view('redsails.index')->with('festivals',$festivals);
    }

    public function addNewFestival(Request $request) {
        $validatedData = $request->validate([
            'festivalYear' => ['required', 'date_format:Y', new Script_Validation],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date']
        ],
        $messages = [
            'festivalYear.date_format' => 'Please provide the festival year in the format yyyy',
            'festivalYear.required' => 'Festival year is a required field. Please select a festival year from the dropdown',
            'startDate.required' => 'Start Date is a required field. Please provide the start date for the festival',
            'startDate.date' => 'Please provide the start date in the format dd/mm/yyyy',
            'endDate.required' => 'End date is a required field. Please provide the end date for the festival',
            'endDate.date' => 'Please provide the end date in the format dd/mm/yyyy'
            ]);

        $year = $request->festivalYear;
        $start_date = $request->startDate;
        $end_date = $request->endDate;
        // dd('Year '.$year.' start '.$start_date.' end'.$end_date);

        $festivals = DB::table('red_sails_festivals')->get();

        foreach($festivals as $f) {
            if($f->year === (int)$year) {
                $request->session()->flash('error', 'Error: A festival for this year already exists. You can view and edit this festival at any time.');
                return redirect()->back();
            }
        }

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
        } else {
            $request->session()->flash('error', 'Error: Something went wrong. Please try again');
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
            return view('pages.showRedSailsProgramme')->with([
                'festivalExists' => $festivalExists,
                'festivalExistsQuery' => $festivalExistsQuery,
                'festivalDates' => $festivalDates
            ]);
        }
        return view('pages.showRedSailsProgramme')->with('festivalExists',$festivalExists);
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

        public function updateFestivalDates(Request $request, $id) {
        //dd($id);
            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $updateDates = DB::table('red_sails_festivals')
                           ->where('id', $id)
                           ->update([
                               'start_date' => $startDate,
                               'end_date' => $endDate
                           ]);

            if($updateDates) {
                $request->session()->flash('success', 'The festival dates were updated successfully. If you have already uploaded a festival programme, these dates will need to be updated');
                return redirect()->back();
            } else {
                $request->session()->flash('error', 'Error: Something went wrong, please try again');
                return redirect()->back();
            }
        }

        public function deleteProgramme($id, Request $request) {
        $deleteProgramme = DB::table('festival_programme')
                           ->where('programme_id', $id)
                           ->delete();

        if($deleteProgramme) {
            $request->session()->flash('success', 'The festival programme for '.$request->festivalDate.' was deleted successfully.');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Error: something went wrong, please try again');
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
