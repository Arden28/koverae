@props([
    'value',
    'status'
])
<div>
    <button type="button" onclick="Livewire.dispatch('openModal', { component: 'modal.email.send-by-mail', arguments: { template: 1, model: {{ $this->model }} } })"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
        <span>
            {{ $value->label }}
        </span>
    </button>
</div>
