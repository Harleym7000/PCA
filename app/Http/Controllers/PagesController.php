<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\News;

class PagesController extends Controller
{
    public function index() {
        $events = DB::select('SELECT * FROM `events` ORDER BY `events`.`id` LIMIT 4');
        $news = News::orderBy('id', 'desc')->get();
        return view('pages.index')->with('events', $events)->with('news', $news);
}

public function about() {
    return view('pages.about');
}
}
