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
        ->select('users.name', 'users.email')
        ->where('role_user.role_id', '=', 3)
        ->get();
        $totalCommitteeMembers = count($committeeMembers);
        $title = "Admin Dashboard";
        return view('dashboard.admin')->with([
            'title' => $title,
            'loggedInUsers' => $loggedInUsers,
            'usersData' => $usersData,
            'totalUsers' => $totalUsers,
            'committeeMembers' => $committeeMembers,
            'totalCommitteeMembers' => $totalCommitteeMembers
            ]);
    }
}
