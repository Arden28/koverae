@props([
    'value',
])

@if ($value == 'Pending')
    <span class="badge bg-info">
       {{ __('Factures en attentes') }}
    </span>
@elseif($value == 'Partial')
    <span class="badge bg-primary">
        {{ __('Partiellement facturé') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Entièrement facturé') }}
    </span>
@endif
