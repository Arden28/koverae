@props([
    'value',
])

@if ($value == 'unpaid')
    <span class="badge bg-info">
       {{ __('Non Payé') }}
    </span>
@elseif($value == 'partial')
    <span class="badge bg-warning">
        {{ __('Partiel payé') }}
    </span>
@elseif('paid')
    <span class="badge bg-primary">
        {{ __('Entièrement payé') }}
    </span>
@endif
