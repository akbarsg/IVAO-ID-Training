@component('mail::message')
# Training Requested

You has been requested for a training session with IVAO Indonesia Training Department. 

@component('mail::panel')
Trainee Name:			{{ $name }} 					
IVAO VID:				{{ $vid }} 					
Training type:     		{{ $type }} ({{ $rating }}) 	
Proposed training time:  {{ $time }} 					
Your message:			{{ $message }} 				
@endcomponent

Please wait until one of staff member review your request and assign a trainer. You can always check your request status by clicking the button below.

@component('mail::button', ['url' => 'training.ivao.web.id/dashboard'])
Check Request Status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
