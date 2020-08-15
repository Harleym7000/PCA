<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $firstname = $request->input('firstname');
        $surname = $request->input('surname');
        $subject = $request->input('subject');
        $body = $request->input('message');
        $email = $request->input('email');

        // $details = array(
        //     'title' => 'Contact Message from '.$firstname.' '.$surname,
        //     'email' => $email,
        //     'subject' => $subject,
        //     'body' => $body
        // );

        \Mail::send('email.sendMail', [

            'body' => $request->input('message')
        ], function ($mail) use ($request) {
            $mail->from($request->email, $request->firstname);
            $mail->to('harleymdev@gmail.com')->subject($request->subject);
            $mail->replyTo($request->email);

        });
        if( count(\Mail::failures()) > 0) {
        $request->session()->flash('error', 'Something went wrong');
        return view('pages.contact');
        } else {
            DB::table('contacts')->insert([
                    'sent' => 1
                ]);
        $request->session()->flash('success', 'Thanks. Your message has been sent');
        return view('pages.contact');
        }
    }
}
