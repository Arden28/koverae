<x-mail::layout>
{{-- Header --}}

{{-- Body --}}
{!! $slot !!}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer :url="config('app.url')">
Généré par {{ config('app.name') }}
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
