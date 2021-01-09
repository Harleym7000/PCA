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
        ->join('users', 'contact_response.respondee_user_id', '=', 'users.id')
        ->join('profiles', 'profiles.user_id', '=', 'contact_response.respondee_user_id')
        ->where('message_id', $messageID)
        ->get();

        $assignedTo = DB::table('contacts')
        ->where('contacts.id', $messageID)
        ->join('users', 'contacts.assigned_to', '=', 'users.id')
        ->join('profiles', 'profiles.user_id', '=', 'contacts.assigned_to')
        ->select('profiles.firstname', 'profiles.surname')
        ->get();

        return view('contact.show')->with([
            'message' => $message,
            'response' => $response,
            'assignedTo' => $assignedTo
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
    public function destroy(Request $request)
    {
        $messageID = $request->deleteMessage;
        //dd($messageID);
       $deleteResponses = DB::table('contact_response')
        ->where('message_id', $messageID)
        ->delete();

        $deleteMessage = DB::table('contacts')
        ->where('id', $messageID)
        ->delete();

        $messages = DB::table('contacts')
        ->get();

        if($deleteResponses && $deleteMessage || $deleteMessage) {
            $request->session()->flash('success', 'The message was deleted successfully');
            return view('contact.index')->with('messages', $messages);
        }
        $request->session()->flash('error', 'There was an error deleting the message. Please try again');
        return view('contact.index')->with('messages', $messages);
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

        public function flipToRead(Request $request)
        {
            $messageID = $_POST["id"];

            $updateRead = DB::table('contacts')
            ->where('id', $messageID)
            ->update(['read' => 1]);
        }

        public function flipToUnread(Request $request)
        {
            $messageID = $_POST["id"];

            $updateUnread = DB::table('contacts')
            ->where('id', $messageID)
            ->update(['read' => 0]);
        }

        public function filter(Request $request) 
        {
            $subject = $request->subjectSearch;
            $name = $request->nameSearch;
            $message = $request->messageSearch;
            $date = $request->dateSearch;

            $query = DB::table('contacts')
            ->where(function ($query) use ($request) {
                $query->where('firstname', 'like', '%'.$request->nameSearch.'%')
                ->orWhere('surname', 'like', '%'.$request->nameSearch.'%');
            })
            ->where('subject', 'like', '%'.$subject.'%')
            ->where('message', 'like', '%'.$message.'%')
            ->where('created_at', 'like', '%'.$date.'%');

            $messages = $query->get();
            return view('contact.index')->with('messages', $messages);
        }
    }
