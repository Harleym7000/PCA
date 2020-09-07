<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    public function index() {
        $news = DB::table('news')->get();
        return view('author.index')->with('news', $news);
    }
}
