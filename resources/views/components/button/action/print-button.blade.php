@props([
    'value',
    'status'
])
<li>
    <a class="dropdown-item cursor-pointer" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}">
        {!! $value->label !!}
    </a>
</li>
