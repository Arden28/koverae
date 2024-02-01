@props([
    'value',
    'status'
])
@if($status != 'canceled')
<div>
    <button type="button" wire:click="{{ $value->action }}" onclick="Livewire.dispatch('openModal', {component: 'modal.email.send-by-mail', arguments: { template: {{ $this->template }}, model: {{ $this->model }} } } )"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
        <span>
            {{ $value->label }}
        </span>
    </button>
</div>

@endif
