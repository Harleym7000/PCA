<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $news = DB::table('news')->
        join('users', 'news.written_by', '=', 'users.id')
        ->join('profiles', 'profiles.user_id', '=', 'users.id')
        ->where('users.id', $userID)
        ->select('news.*', 'profiles.firstname', 'profiles.surname')->paginate(8);
        return view('news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            //dd('yes');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/news_images', $filenameToStore);
        } else {
            $filenameToStore = 'cleanup.jpg';
        }

        $authorID = Auth::user()->id;
        $news = new News;
        $news->title = $request->input('headline');
        $news->story = $request->input('story');
        $news->image = $filenameToStore;
        $news->written_by = $authorID;

        if($news->save()) {
            $request->session()->flash('success', 'The news story was published successfully');
            return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error publishing this news story. Please try again later');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsstory = News::find($id);
        return view('news.show')->with('newsstory', $newsstory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if($request->hasFile('news_image')) {
            //dd('yes');
            $filenameWithExt = $request->file('news_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('news_image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $request->file('news_image')->storeAs('public/news_images', $filenameToStore);
        } else {
            $filenameToStore = 'cleanup.jpg';
        }
        $news->title = $request->title;
        $news->story = $request->story;
        $news->image = $filenameToStore;

        if($news->save()) {
            $request->session()->flash('success', 'The news story was updated successfully');
                return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error updating the news story');
                return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $news = $request->id;
        $delete = DB::table('news')
        ->where('id', $news)
        ->delete();

        if($delete) {
            $request->session()->flash('success', 'The news story was deleted successfully');
                return redirect()->back();
        }
        $request->session()->flash('error', 'There was an error deleting the news story');
                return redirect()->back();
    }
}
