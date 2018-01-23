<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class NewTrainingRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        // dd($request);
        // return $this->view('mail.tes')->to($request->email)->from('ivaoiddivision@gmail.com');
        // return $this->view('mail.tes')->to('akbar_sg@yahoo.co.id');
        return $this->view('mail.tes', ['request'=>$request])->to($request->email);
        
    }
}
