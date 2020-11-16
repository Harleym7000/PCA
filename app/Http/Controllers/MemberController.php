<?php

namespace App\Http\Controllers;

use App\Event;

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
        $events = Event::all();
    return view('member.index')->with([
        'events' => $events 
        ]);
    }

    public function viewPolicies()
    {
        $policies = DB::table('policies')
        ->get();

        return view('member.policies')->with('policies', $policies);

    }
}