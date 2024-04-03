@props([
    'value',
    'id'
])
<div>
    @if($value == 'manufacture')
     <span>
      {{ __('Fabriquer ce produit') }}
     </span>
    @elseif('subcontracting')
    <span>
     {{ __('Sous-traitant') }}
    </span>
    @else
    <span>
     {{ __('Kit') }}
    </span>
    @endif
</div>