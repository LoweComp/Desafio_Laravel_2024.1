@component('mail::message')
    # {{ $subject }}

    {{ $body }}

    Atte.,<br>
    {{ config('Hospital Laravel 2024.1') }}
@endcomponent
