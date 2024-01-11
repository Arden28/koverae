@props([
    'value',
    'data'
])
<h1 class="d-flex flex-row align-items-center">
    @if($this->reference)
        {{ $this->reference }}
    @else
        {{ __('Nouveau') }}
    @endif
</h1>
