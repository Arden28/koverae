@props([
    'value',
])

@if ($value == 'draft')
    <span class="badge bg-info">
       {{ __('Brouillon') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Fait') }}
    </span>
@endif
