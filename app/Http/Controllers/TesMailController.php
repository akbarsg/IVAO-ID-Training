<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewTrainingRequest;
use App\Mail\TesMarkdownEmail;

class TesMailController extends Controller
{
    public function send()
    {
    	$mailvar = ['name' => '$thename', 'email' => 'akbar_sg@yahoo.co.id'];

		Mail::send('mail.tes', ['mailvar' => $mailvar], function ($message) use ($mailvar) {

        $message->from('noreply@google.com', 'google.com');
        $message->to($mailvar['email'], $mailvar['name'])->subject('You recieved a message');

    });
    }

    public function send2()
    {
    	Mail::to('akbar_sg@yahoo.co.id')->send(new TesMarkdownEmail());
    }
}
