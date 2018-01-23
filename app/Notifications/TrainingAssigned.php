<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TrainingAssigned extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($training)
    {
        // dd($training);
        $this->training = $training;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('Your training request has been approved and assigned by one of our Training Department staff member! Check your training details by logging in to the IVAO Indonesia Training Department website.')
                    ->action('Log In', url('training.ivao.web.id/training'))
                    ->line('Thank you for requesting a training with us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // dd($this);
        return [
            'training_id' => $this->training->id,
            'request_id' => $this->training->request->id,
            'trainer_id' => $this->training->trainer_id,
            'trainee_id' => $this->training->request->trainee_id,
            'type' => $this->training->request->type,
            'message' => "You just assign yourself as " . $this->training->trainee_name . "'s trainer!",
        ];
    }
}
