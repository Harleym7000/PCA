<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Inbox";
        $contacts = DB::table('contact_us')
        ->groupBy('first_name')
        ->get();
        return view('contact.index')->with([
            'title' => $title,
            'contacts' => $contacts
            ]);
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

        $contactfirst_name = $request->input('firstname');
        $contactsurname = $request->input('surname');
        $contactsubject = $request->input('subject');
        $contactmessage = $request->input('message');

        DB::table('contact_us')->insert(
            ['first_name' => $contactfirst_name, 'surname' => $contactsurname, 'subject' => $contactsubject, 'message' => $contactmessage]
        );
        

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
    public function show($first_name)
    {
        $title = $first_name;
        $contact = DB::table('contact_us')
        ->where('first_name', '=', $first_name)
        ->get();
        return view('contact.show')->with([
            'contact' => $contact,
            'title' => $title
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

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

    public function getMessages() {
       $messages = DB::table('contact_us')
       ->groupBy('first_name')
       ->orderBy('created_at', 'desc');
       $result = $messages->get();

       return response()->json($result);
    }

    public function markRead() 
    {
        $id = $_POST['id'];
        DB::table('contact_us')
        ->where('id', $id)
        ->update(['message_read' => 1]);
    }
}
