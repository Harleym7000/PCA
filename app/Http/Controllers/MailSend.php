<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailSend extends Controller
{
    public function send()
    {
        $details = [
            'title' => 'Title: Mail From PCA',
            'body' => 'Body: This is a test'
        ];

        \Mail::to('harleymdev@gmail.com')->send(new SendMail($details));
        return view('email.thanks');
    }

    public function contact_us(Request $request) {
        $firstname = $request->input('firstname');
        $surname = $request->input('surname');
        $subject = $request->input('subject');
        $body = $request->input('message');
        $email = $request->input('email');

        $details = array(
            'title' => 'Contact Message from '.$firstname.' '.$surname,
            'email' => $email,
            'subject' => $subject,
            'body' => $body
        );

        \Mail::to('harleymdev@gmail.com')->send('email.sendMail', $details, function($message) use ($details) {
            $message->from($details['email']);
            $message->subject($details['subject']);
        });
        return view('email.thanks');
    }
}
