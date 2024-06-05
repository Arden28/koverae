@props([
    'value',
    'status'
])
@if($status != 'canceled')
<div>
    <button class="d-none d-lg-inline-flex" type="button" onclick="Livewire.dispatch('openModal', {component: 'app::modal.send-email-modal', arguments: { template: {{ $this->template }}, model: {{ $this->model }} } } )"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
        <span>
            {{ $value->label }}
        </span>
    </button>
    <li class="d-lg-none"><a class="dropdown-item" onclick="Livewire.dispatch('openModal', {component: 'app::modal.send-email-modal', arguments: { template: {{ $this->template }}, model: {{ $this->model }} } } )">{{ $value->label }}</a></li>
</div>

@endif
