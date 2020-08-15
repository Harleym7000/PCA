<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MailSend extends Controller
{

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

    public function subscribe(Request $request)
    {
        $email = $request->input('email');

        \Mail::send('email.subConfirm', [
            'body' => 'Hello! You are receiving this email as you have subscribed to the PCA newsletter. If this was 
            not you then please simply ignore this email. To confirm you wish to be subscribed to the PCA newsletter, 
            please click on the link below'
        ], function ($mail) use ($request) {
            $mail->from('harleymdev@gmail.com', 'PCA Newsletter');
            $mail->to($request->email)->subject('PCA Newsletter Subscription');
        });
        return view('email.subscribed');
    }
}
