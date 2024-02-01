@props([
    'value'
])
@if($value)
<div>
    {{ \Carbon\Carbon::make($value)->diffForHumans() }}
    {{-- {{ $value > now() ? 'Expire ' . \Carbon\Carbon::make($value)->diffForHumans() : 'Expiré ' . \Carbon\Carbon::make($value)->diffForHumans() }} --}}

</div>
@endif
