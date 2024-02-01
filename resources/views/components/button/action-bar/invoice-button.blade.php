@props([
    'value',
    'status'
])
    @if(!$this->invoice)
    <div>
        <button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
            <span>
                {{ $value->label }} <span wire:loading>...</span>
            </span>
        </button>
    </div>
    @endif
