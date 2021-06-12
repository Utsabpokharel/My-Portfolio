@component('mail::message')
# Contact/Feedback
Hey, Someone with following details wants to contact or provide some feedbacks to you.<br>

<b>From :</b> {{$details['name']}} <br>

<b>Email :</b> {{$details['email']}} <br>

<b>Subject :</b> {{$details['subject']}} <br>

<b>Message :</b> {{$details['message']}}


@component('mail::button', ['url' => 'https://www.utsabpokharel.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
