@props([
    'value'
])
<div>
    {{ format_currency($value / 100) }}
</div>
