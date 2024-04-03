@props([
    'value',
    'status'
])
@if($status != 'canceled')
<div>
    <button class="d-none d-lg-inline-flex" type="button" wire:click="{{ $value->action }}" onclick="Livewire.dispatch('openModal', {component: 'modal.email.send-by-mail', arguments: { template: {{ $this->template }}, model: {{ $this->model }} } } )"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
        <span>
            {{ $value->label }}
        </span>
    </button>
    <li class="d-lg-none"><a class="dropdown-item" wire:click="{{ $value->action }}" onclick="Livewire.dispatch('openModal', {component: 'modal.email.send-by-mail', arguments: { template: {{ $this->template }}, model: {{ $this->model }} } } )">{{ $value->label }}</a></li>
</div>

@endif
