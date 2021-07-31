@component('mail::message')
# Introduction

The body of your message.
{{ $data['name'] }}
{{ $data['email'] }}
{{ $data['password'] }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login', 'color' => 'success'])
Login to JAINJ to approve this user.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent