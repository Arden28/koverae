@props([
    'value'
])
@if($value)
<div>
    {{ \Carbon\Carbon::parse($value)->format('d/m/Y') }}
</div>
@endif
