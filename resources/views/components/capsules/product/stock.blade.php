@props([
    'value',
])
@php
    $unit = \Modules\Inventory\Entities\UoM\UnitOfMeasure::find($this->uom);
@endphp
@if($this->product_type == 'storable')
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quantity-modal', arguments: {product: {{ $this->product }} } } )">
    <i class="k_button_icon bi bi-inboxes"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}">
        <span class="k_horizontal_span text-truncate">{{ $value->label }}</span>
        <span class="stat_value d-none d-lg-flex">
            {{ $this->product->product_quantity ?? "0,00" }} {{ $unit->name }}
        </span>
    </a>
</div>
@endif
