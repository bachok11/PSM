@component('mail::message')
# Introduction

Your account is approved, Please log in to add daerah and mukim for your profile!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login', 'color' => 'success'])
Login to JAINJ.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent