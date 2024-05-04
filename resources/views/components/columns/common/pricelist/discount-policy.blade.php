@props([
    'value'
])
<div>
    @if($value == 'included')
        {{ __("La remise est comprise dans le prix indiqué") }}
    @else
        {{ __("Afficher le prix public et la remise au client") }}
    @endif
</div>
