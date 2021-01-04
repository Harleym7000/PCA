<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function admin() {
        $totalUsersData = DB::table('users')->get();
        $totalUsers = count($totalUsersData);
        $committeeMembers = DB::table('users')
        ->join('role_user', 'user_id', '=', 'users.id')
        ->select('users.email')
        ->where('role_user.role_id', '=', 3)
        ->get();
        $totalCommitteeMembers = count($committeeMembers);
        $uniqueVisits = DB::table('visitors')->get(['ip']);
        $totalUniqueVisits = count($uniqueVisits);
        $contactMessages = DB::table('contacts')->get();
        $totalContactMessages = count($contactMessages);
        $date = Carbon::now()->format('Y-m');
        $usersThisMonthQuery = DB::select("SELECT * FROM users WHERE users.created_at LIKE '%$date%'");
        $usersThisMonth = count($usersThisMonthQuery);
        $title = "Dashboard";
        return view('dashboard.dashboard')->with([
            'title' => $title,
            'totalUsers' => $totalUsers,
            'committeeMembers' => $committeeMembers,
            'totalCommitteeMembers' => $totalCommitteeMembers,
            'totalUniqueVisits' => $totalUniqueVisits,
            'totalContactMessages' => $totalContactMessages,
            'usersThisMonth' => $usersThisMonth
            ]);
    }

    public function event() {
        return view('dashboard.event');
    }

    public function getCommitteeGrowth() 
    {
        $year = Carbon::now()->year;
        $janQuery = DB::table('user_reg')
                      ->where('month', 'Jan')
                      ->where('year', $year)
                      ->get();
                      $janMembers = count($janQuery);
        $febQuery = DB::table('user_reg')
                      ->where('month', 'Feb')
                      ->where('year', $year)
                      ->get();
                      $febMembers = count($febQuery);
        $marQuery = DB::table('user_reg')
                      ->where('month', 'Mar')
                      ->where('year', $year)
                      ->get();
                      $marMembers = count($marQuery);
        $aprQuery = DB::table('user_reg')
                      ->where('month', 'Apr')
                      ->where('year', $year)
                      ->get();
                      $aprMembers = count($aprQuery);
                      $mayQuery = DB::table('user_reg')
                      ->where('month', 'May')
                      ->where('year', $year)
                      ->get();
                      $mayMembers = count($mayQuery);
                      $junQuery = DB::table('user_reg')
                      ->where('month', 'Jun')
                      ->where('year', $year)
                      ->get();
                      $junMembers = count($junQuery);
                      $julQuery = DB::table('user_reg')
                      ->where('month', 'Jul')
                      ->where('year', $year)
                      ->get();
                      $julMembers = count($julQuery);
                      $augQuery = DB::table('user_reg')
                      ->where('month', 'Aug')
                      ->where('year', $year)
                      ->get();
                      $augMembers = count($augQuery);
                      $sepQuery = DB::table('user_reg')
                      ->where('month', 'Sep')
                      ->where('year', $year)
                      ->get();
                      $sepMembers = count($sepQuery);
                      $octQuery = DB::table('user_reg')
                      ->where('month', 'Oct')
                      ->where('year', $year)
                      ->get();
                      $octMembers = count($octQuery);
                      $novQuery = DB::table('user_reg')
                      ->where('month', 'Nov')
                      ->where('year', $year)
                      ->get();
                      $novMembers = count($novQuery);
                      $decQuery = DB::table('user_reg')
                      ->where('month', 'Dec')
                      ->where('year', $year)
                      ->get();
                      $decMembers = count($decQuery);

        return response()->json(array(
            'janMembers' => $janMembers,
            'febMembers' => $febMembers,
            'marMembers' => $marMembers,
            'aprMembers' => $aprMembers,
            'mayMembers' => $mayMembers,
            'junMembers' => $junMembers,
            'julMembers' => $julMembers,
            'augMembers' => $augMembers,
            'sepMembers' => $sepMembers,
            'octMembers' => $octMembers,
            'novMembers' => $novMembers,
            'decMembers' => $decMembers,
        ));
    }

    public function getSiteTraffic()
    {
        $year = Carbon::now()->year;
        $janQuery = DB::table('visitors')
                      ->where('visit_month', 'Jan')
                      ->where('visit_year', $year)
                      ->get();
                      $janVisitors = count($janQuery);
                      $febQuery = DB::table('visitors')
                      ->where('visit_month', 'Feb')
                      ->where('visit_year', $year)
                      ->get();
                      $febVisitors = count($febQuery);
                      $marQuery = DB::table('visitors')
                      ->where('visit_month', 'Mar')
                      ->where('visit_year', $year)
                      ->get();
                      $marVisitors = count($marQuery);
                      $aprQuery = DB::table('visitors')
                      ->where('visit_month', 'Apr')
                      ->where('visit_year', $year)
                      ->get();
                      $aprVisitors = count($aprQuery);
                      $mayQuery = DB::table('visitors')
                      ->where('visit_month', 'May')
                      ->where('visit_year', $year)
                      ->get();
                      $mayVisitors = count($mayQuery);
                      $junQuery = DB::table('visitors')
                      ->where('visit_month', 'Jun')
                      ->where('visit_year', $year)
                      ->get();
                      $junVisitors = count($junQuery);
                      $julQuery = DB::table('visitors')
                      ->where('visit_month', 'Dec')
                      ->where('visit_year', $year)
                      ->get();
                      $julVisitors = count($julQuery);
                      $augQuery = DB::table('visitors')
                      ->where('visit_month', 'Aug')
                      ->where('visit_year', $year)
                      ->get();
                      $augVisitors = count($augQuery);
                      $sepQuery = DB::table('visitors')
                      ->where('visit_month', 'Sep')
                      ->where('visit_year', $year)
                      ->get();
                      $sepVisitors = count($sepQuery);
                      $octQuery = DB::table('visitors')
                      ->where('visit_month', 'Oct')
                      ->where('visit_year', $year)
                      ->get();
                      $octVisitors = count($octQuery);
                      $novQuery = DB::table('visitors')
                      ->where('visit_month', 'Nov')
                      ->where('visit_year', $year)
                      ->get();
                      $novVisitors = count($novQuery);
        $decQuery = DB::table('visitors')
                      ->where('visit_month', 'Dec')
                      ->where('visit_year', $year)
                      ->get();
                      $decVisitors = count($decQuery);
                      return response()->json(array(
                        'janVisitors' => $janVisitors,
                        'febVisitors' => $febVisitors,
                        'marVisitors' => $marVisitors,
                        'aprVisitors' => $aprVisitors,
                        'mayVisitors' => $mayVisitors,
                        'junVisitors' => $junVisitors,
                        'julVisitors' => $julVisitors,
                        'augVisitors' => $augVisitors,
                        'sepVisitors' => $sepVisitors,
                        'octVisitors' => $octVisitors,
                        'novVisitors' => $novVisitors,
                        'decVisitors' => $decVisitors,
                    ));
    }
}
