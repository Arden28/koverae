@props([
    'value',
    'status'
])
@if($this->product_type == 'storable' || $this->product_type == 'consumable')
<div>
    <button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}"  id="top-button" class="btn btn-primary">
        <span>
            {{ $value->label }} <p wire:loading wire:target="{{ $value->action }}">...</p>
        </span>
    </button>
</div>
@endif
