@props([
    'value',
])

@if ($value == 'storable')
    <p>
       {{ __('Produit stockable') }}
    </p>
@elseif($value == 'consumable')
    <p>
        {{ __('Consommable') }}
    </p>
@elseif($value == 'service')
    <p>
        {{ __('Service') }}
    </p>
@else
    <p>
        {{ __('Frais de reservation') }}
    </p>
@endif
