@component('mail::message')
# Password Changed

Your password was changed for the account on our website.
<i>Please check your account if you have not changed.</i>

@component('mail::button', ['url' => 'https://www.utsabpokharel.com.np'])
Click here...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
