@component('mail::message')
# Training Assigned

Your training request has been accepted by our staff. Please attend the training session as planned with the assigned trainer.

@component('mail::panel')
Trainer name: {{ $name }} <br>
Trainer email: <a href="mailto:{{ $email }}">{{ $email }}</a> <br>
Training type: {{ $type }} ({{ $rating }}) <br>
Proposed training time: {{ $time }} <br>
Your message: {{ $message }} <br>
Trainer message: {{ $trainermessage }}<br>
@endcomponent

If you have any question regarding this training, you may contact the trainer using the email address above. You can always check your training status by clicking the button below.

@component('mail::button', ['url' => 'training.ivao.web.id/dashboard'])
Check Training Status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
