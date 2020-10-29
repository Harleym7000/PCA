<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('contacts')->orderBy('id', 'DESC')->get();
        return view('contact.index')->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $token = $request->input('g-recaptcha-response');
        // if(strlen($token) > 0) {
            // successfully submitted

        
        

        // $request->session()->flash('success', 'Your message has been sent');
        return view('pages.contact-submit');
        // } else {
        //     return redirect('/contact-us');
        // }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messageID = $id;

        $message = DB::table('contacts')
        ->where('id', $messageID)
        ->get();

        $response = DB::table('contact_response')
        ->where('message_id', $messageID)
        ->get();

        return view('contact.show')->with([
            'message' => $message,
            'response' => $response
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function closeRequest(Request $request)
    {
        $messageID = $request->contactClose;

        //dd($messageID);

       $close = DB::table('contacts')
        ->where('id', $messageID)
        ->update(['closed' => 1]);

        if($close) {
            $request->session()->flash('success', 'The request has now been marked as closed');
                    return redirect()->back();
        }

        }
    }
