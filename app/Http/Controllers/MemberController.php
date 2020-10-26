<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index() 
    {
    return view('member.index');
    }

    public function viewPolicies()
    {
        $policies = DB::table('policies')
        ->get();

        return view('member.policies')->with('policies', $policies);

    }
}