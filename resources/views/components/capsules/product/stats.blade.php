@props([
    'value',
])
@php
    $unit = \Modules\Inventory\Entities\UoM\UnitOfMeasure::find($this->uom);
@endphp
<!-- Routes -->
@if($this->product_type == 'storable')
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-graph-up"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span text-truncate">{{ $value->label }}</span>
        <span class="stat_value d-none d-lg-flex">
            {{ forecast_stock($this->product) }}
        </span>
    </a>
</div>
@endif
