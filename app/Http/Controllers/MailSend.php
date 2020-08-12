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

        \Mail::to('harleym7000@gmail.com')->send(new SendMail($details));
        return view('email.thanks');
    }
}
