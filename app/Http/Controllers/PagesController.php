<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
        $events = DB::table('events')
        ->where('approved', 1)
        ->orderBy('date', 'asc')
        ->limit(3)
        ->get();
        $news = News::orderBy('id', 'desc')->get();
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $mon = Carbon::now()->format('M');
        $year = Carbon::now()->format('Y');
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');
        DB::table('visitors')->insert(
            ['ip' => $visitor_ip, 'visit_month' => $mon, 'visit_year' => $year, 'visit_date' => $date, 'visit_time' => $time]
        );
        return view('pages.index')->with('events', $events)->with('news', $news)->with('eventsCount', count($events));
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

    public function getEventsByFilters(Request $request)
    {
        $eventTitle = $request->title;
        $eventDate = $request->date;
        $eventTime = $request->time;

        $query = DB::table('events')
        ->where('title', 'like', '%'.$eventTitle.'%')
        ->where('date', 'like', '%'.$eventDate.'%')
        ->where('time', 'like', '%'.$eventTime.'%')
        ->where('approved', 1);
        $events = $query->get();
        return view('pages.events')->with('events', $events);
    }

    public function getNewsByFilters(Request $request)
    {
        $newsTitle = $request->title;
        $newsDate = $request->date;
        $newsAuthor = $request->author;

        $query = DB::table('news')
        ->where('title', 'like', '%'.$newsTitle.'%')
        ->where('created_at', 'like', '%'.$newsDate.'%');
        $news = $query->get();
        return view('pages.news')->with('news', $news);
    }

    public function showEvent($id)
    {
        $events = DB::table('events')
        ->where('id',$id)
        ->get();

        $images = DB::table('event_images')
        ->where('event_id', $id)
        ->get();

        return view('pages.showevent')->with([
            'events' => $events,
            'images' => $images
            ]);
    }

    public function showNewsStory($id)
    {
        
        $news = DB::table('news')
        ->where('id', $id)
        ->get();

        $getAuthorID = 0;

        foreach($news as $n) {
            $getAuthorID = $n->written_by; 
        }
        
        $getAuthor = DB::table('news')
        ->join('profiles', 'profiles.user_id', '=', 'news.written_by')
        ->select('firstname', 'surname')
        ->where('written_by', $getAuthorID)
        ->groupBy('written_by')
        ->get();

        return view('pages.shownews')->with(['news' => $news, 'author' => $getAuthor]);
    }

    public function createUserPassword(Request $request, $id)
    {

        if(!Auth::guest()) {
            $request->session()->flash('error', 'You are not authorised to complete this action');
                return redirect('/');
        }
     
    //dd($id);

    $validatedData = $request->validate([
        'password' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/'],
        'password_con' => ['required', 'max:20', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@~£^&*()-_=+`¬¦?><.,;:]).*$/']
    ],
    $messages = [
        'password.regex' => 'Passwords must contain at least 1 capital letter, 1 number and 1 special character (e.g. @#!?%)',
        'password_con.required' => 'Passwords do not match',
        ]);

        $pass = $request->password;
        $passCon = $request->password_con;

        //dd($pass);

    if($pass === $passCon) {
        $password = Hash::make($passCon);
        DB::table('users')
        ->where('id', $id)
        ->update(['password' => $password]);

        DB::table('user_tokens')
        ->where('user_id', $id)
        ->update(['verified' => 1]);

        DB::table('role_user')
        ->where('user_id', $id)
        ->where('role_id', 6)
        ->delete();

        $request->session()->now('success', ' Your account was created successfully. You may now log in using your credentials');
            return view('auth.login');
    }
    

    }
}
