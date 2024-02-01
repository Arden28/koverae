@props([
    'value',
    'status'
])
@if($this->status == $value->primary)
<div>
    <button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}"  id="top-button" class="btn btn-primary primary">
        <span>
            {{ $value->label }} <span wire:loading wire:target="{{ $value->action }}">...</span>
        </span>
    </button>
</div>
@endif
