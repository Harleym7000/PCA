<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardsController extends Controller
{
    public function admin() {
        $usersData = DB::table('users')
        ->where('logged_in', '=', 1)
        ->get();
        $loggedInUsers = count($usersData);
        $totalUsersData = DB::table('users')->get();
        $totalUsers = count($totalUsersData);
        $committeeMembers = DB::table('users')
        ->join('role_user', 'user_id', '=', 'users.id')
        ->select('users.firstname', 'users.surname', 'users.email')
        ->where('role_user.role_id', '=', 3)
        ->get();
        $totalCommitteeMembers = count($committeeMembers);
        $uniqueVisits = DB::table('visitors')->distinct()->get(['ip']);
        $totalUniqueVisits = count($uniqueVisits);
        $contactMessages = DB::table('contacts')->get();
        $totalContactMessages = count($contactMessages);
        $usersThisMonthQuery = DB::select('SELECT * FROM users WHERE users.created_at >= (NOW() - INTERVAL 1 MONTH)');
        $usersThisMonth = count($usersThisMonthQuery);
        $title = "Admin Dashboard";
        return view('dashboard.admin')->with([
            'title' => $title,
            'loggedInUsers' => $loggedInUsers,
            'usersData' => $usersData,
            'totalUsers' => $totalUsers,
            'committeeMembers' => $committeeMembers,
            'totalCommitteeMembers' => $totalCommitteeMembers,
            'totalUniqueVisits' => $totalUniqueVisits,
            'totalContactMessages' => $totalContactMessages,
            'usersThisMonth' => $usersThisMonth
            ]);
    }

    public function events() {
        $title = 'Events Dashboard';
        return view('dashboard.event')->with([
            'title' => $title
        ]);
    }
}
