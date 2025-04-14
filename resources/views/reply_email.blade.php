@component('mail::message')
# Hi {{ $name }},

{{-- Esto es un comentario en Blade --}}
{{ $senderMessage }}

Receive your email. I will try quickly answer.

@component('mail::button', ['url' => $mailData['url']])
Visit Our Website
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
