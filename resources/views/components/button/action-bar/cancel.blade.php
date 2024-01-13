@props([
    'value',
    'status'
])
    @if($status != 'canceled')
    <div>
        <button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
            <span>
                {{ $value->label }}
            </span>
        </button>
    </div>
    @endif
