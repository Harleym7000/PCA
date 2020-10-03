<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardsController extends Controller
{
    public function admin() {
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
        $janMembers = DB::table('users')
                      ->join('role_user', 'role_user.user_id', '=', 'users.id')
                      ->where('role_user.role_id', '=', 3)
                      ->whereMonth('users.created_at', '=', 1)
                      ->get();
        $janMembersTotal = count($janMembers);
        return response()->json($janMembersTotal);
    }
}
