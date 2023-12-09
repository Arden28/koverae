@props([
    'value',
])

@if ($value == 'request')
    <span class="badge bg-info">
       {{ __('Demande') }}
    </span>
@elseif($value == 'sent')
    <span class="badge bg-primary">
        {{ __('Envoyé') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Bon de commande') }}
    </span>
@endif
