@props([
    'value'
])
<div>
    {{ \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s') }}
</div>
