<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\News;

class PagesController extends Controller
{
    public function index() {
        $events = DB::select('SELECT * FROM `events` WHERE `events`.`approved` = 1 ORDER BY `events`.`id` LIMIT 4');
        $news = News::orderBy('id', 'desc')->get();
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        DB::table('visitors')->insert(
            ['ip' => $visitor_ip]
        );
        return view('pages.index')->with('events', $events)->with('news', $news);
}

public function about() {
    return view('pages.about');
}

public function events() {
    $events = DB::select('SELECT * FROM `events` WHERE `events`.`approved` = 1 ORDER BY `events`.`id`');
    return view('pages.events')->with('events', $events);
}

public function news()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('pages.news')->with('news', $news);
    }

public function contact()
    {
        return view('pages.contact');
    }
}
