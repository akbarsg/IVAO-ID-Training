<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

// use Illuminate\Http\Request;
use App\RequestModel;
use App\AtcRating;
use App\PilotRating;

class TrainingRequested extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $request;
    private $typename;
    private $rating;

    public function __construct(RequestModel $request)
    {
        $this->request = $request;
        if ($request->type == 1) {
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
        return $this->markdown('emails.training.requested')
                    ->with([
                        'request' => $this->request,
                        'name' => $this->request->user->name,
                        'vid' => $this->request->user->vid,
                        'type' => $this->typename,
                        'rating' => $this->rating,
                        'time' => $this->request->training_time,
                        'message' => $this->request->note,
                    ]);
    }
}
