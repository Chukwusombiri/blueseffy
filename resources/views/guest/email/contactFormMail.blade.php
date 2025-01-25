@component('mail::message')
# {{$sjt}}

Customer Email: {{$email}} <br>
Message: {{$msg}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
