@props([
    'value'
])
<div>
    @if($value->type == 'action')
    <button class="btn {{ $value->class }}" wire:click="{{ $value->action }}">{{ $value->label }}</button>
    @elseif($value->type == 'modal')
    <button class="btn {{ $value->class }}"  onclick="Livewire.dispatch('openModal', {!! $value->action !!})">{{ $value->label }}</button>
    @endif
</div>