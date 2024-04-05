@props([
    'value',
    'status'
])
<div>
    <li class="dropdown-item cursor-pointer" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}">
        {!! $value->label !!}
    </li>
    <!--<li><hr class="dropdown-divider"></li>-->
</div>
