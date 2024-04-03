@props([
    'value',
])

@if ($value == 'inactive')
    <span class="badge bg-info">
       {{ __('Inactif') }}
    </span>
@elseif($value == 'active')
    <span class="badge bg-success">
        {{ __('Actif') }}
    </span>
@elseif('on_break')
    <span class="badge bg-primary">
        {{ __('En pause') }}
    </span>
@else
<span class="badge bg-danger">
    {{ __('Fermé') }}
</span>
@endif
