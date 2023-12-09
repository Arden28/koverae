@props([
    'value',
])

@if ($value == 'shipped')
    <span class="badge bg-info">
       {{ __('Livrée') }}
    </span>
@elseif($value == 'pending')
    <span class="badge bg-primary">
        {{ __('En cours') }}
    </span>
@else

@endif
