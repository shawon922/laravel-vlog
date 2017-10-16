@component('mail::message')
# Introduction

Hey {{ $user->name }}, welcome to my awesome website.

@component('mail::button', ['url' => 'http://iammahfuz.com'])
Goto my Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
