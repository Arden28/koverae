@props([
    'value'
])
@if($value)
<div>
    {{ $value > now() ? 'Expire ' . \Carbon\Carbon::make($value)->diffForHumans() : 'Expiré ' . \Carbon\Carbon::make($value)->diffForHumans() }}

</div>
@endif
