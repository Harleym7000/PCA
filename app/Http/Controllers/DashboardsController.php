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
        $title = "Admin Dashboard";
        return view('dashboard.admin')->with([
            'title' => $title,
            'loggedInUsers' => $loggedInUsers,
            'usersData' => $usersData
            ]);
    }
}
