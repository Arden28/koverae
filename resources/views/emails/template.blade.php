<x-mail::message>
# {{ $subject }}

{!! $content !!}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
