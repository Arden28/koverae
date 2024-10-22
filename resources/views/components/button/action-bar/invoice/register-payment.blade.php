@props([
    'value',
    'status'
])
    @if($status == 'posted' && $this->invoice->due_amount >= 1 )
    <div>
        <button class="d-none d-lg-inline-flex" type="button" onclick="Livewire.dispatch('openModal', {component: 'modal.invoice.register-payment', arguments: { invoice: {{ $this->invoice }}}} )"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
            <span>
                {{ $value->label }}
            </span>
        </button>
        <li class="d-lg-none"><a class="dropdown-item" onclick="Livewire.dispatch('openModal', {component: 'modal.invoice.register-payment', arguments: { invoice: {{ $this->invoice }}}} )">{{ $value->label }}</a></li>
    </div>
    @endif
