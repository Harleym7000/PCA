<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedSailsController extends Controller
{
    public function index() {
        return view('events.red-sails');
    }
}
