@props([
    'value',
    'status'
])
@if($sale->invoice == null && $status != 'canceled')
<button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}" class="btn btn-primary primary">
    <span>
        {{ $value->label }} <p wire:loading wire:target="{{ $value->action }}">...</p>
    </span>
</button>
@endif
