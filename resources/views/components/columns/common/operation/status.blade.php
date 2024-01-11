@props([
    'value',
])

@if ($value == 'draft')
    <span class="badge rounded bg-info">
       {{ __('Brouillon') }}
    </span>
@elseif($value == 'ready')
    <span class="badge bg-primary">
        {{ __('Prêt') }}
    </span>
@elseif($value == 'done')
    <span class="badge bg-success">
        {{ __('Fait') }}
    </span>
@else
    <span class="badge k_tag bg-danger">
        {{ __('Annulée') }}
    </span>
@endif
