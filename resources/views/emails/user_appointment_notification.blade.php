@component('mail::message')
# Introduction

The body of your message.
Your Appointment with the Examiner is being made.


@component('mail::button', ['url' => 'http://127.0.0.1:8000/login', 'color' => 'success'])
Login to JAINJ to check the date of your appointment.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent