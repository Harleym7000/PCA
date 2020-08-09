<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);
        $roles = DB::table('roles')->get();
        return view('admin.users.index')->with([
            'users' => $users,
            'roles' => $roles
            ]);
    }
}
