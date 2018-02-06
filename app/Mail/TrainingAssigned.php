<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Training;
use Illuminate\Support\Facades\DB;
use App\AtcRating;
use App\PilotRating;

class TrainingAssigned extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $training;
    private $typename;
    private $rating;
    
    public function __construct(Training $training)
    {
        $this->training = $training;
        if ($training->request->type == 1) {
            $this->typename = 'ATC';
            $this->rating = AtcRating::getNextRating()->name;
        } else {
            $this->typename = 'Pilot';
            $this->rating = PilotRating::getNextRating()->name;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.training.assigned')
                    ->with([
                        'request' => $this->training->request,
                        'name' => $this->training->trainer->name,
                        'email' => $this->training->trainer->staff_email,
                        'vid' => $this->training->request->user->vid,
                        'type' => $this->typename,
                        'rating' => $this->rating,
                        'time' => $this->training->request->training_time,
                        'message' => $this->training->request->note,
                        'trainermessage' => $this->training->note,
                    ]);
    }
}
