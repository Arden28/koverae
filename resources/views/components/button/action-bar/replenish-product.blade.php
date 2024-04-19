@props([
    'value',
    'status'
])
@if($this->product_type == 'storable' || $this->product_type == 'consumable')
    @if(module('purchase'))
    <div>
        <button class="d-none d-lg-inline-flex" type="button" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quatity-modal', arguments: {product: {{ $this->product }} } } )"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
            <span>
                {{ $value->label }} <span wire:loading wire:target="{{ $value->action }}" >...</span>
            </span>
        </button>
        <li class="d-lg-none"><a class="dropdown-item" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quatity-modal', arguments: {product: {{ $this->product }} } } )">{{ $value->label }} <span wire:loading wire:target="{{ $value->action }}" >...</span></a></li>
    </div>
    @endif
@endif
