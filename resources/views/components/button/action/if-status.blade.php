@props([
    'value',
    'status'
])
<div>
    <li class="cursor-pointer dropdown-item {{ $this->status == $value->condition ? 'd-none' : '' }}" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}">
        {!! $value->label !!}
    </li>
    @if($value->separator)
    <li><hr class="separator"></li>
    @endif
</div>
