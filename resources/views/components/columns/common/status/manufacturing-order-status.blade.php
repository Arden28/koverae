@props([
    'value',
])

@if ($value == 'draft')
    <span class="badge bg-info">
       {{ __('Brouillon') }}
    </span>
@elseif($value == 'confirmed')
    <span class="badge bg-primary">
        {{ __('Confirmé') }}
    </span>
@elseif($value == 'to_close')
    <span class="badge bg-warning">
        {{ __('A clôturer') }}
    </span>
@elseif($value == 'canceled')
    <span class="badge bg-danger">
        {{ __('Confirmé') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Fait') }}
    </span>
@endif
