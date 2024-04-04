@props([
    'value',
])
@php
    $unit = \Modules\Inventory\Entities\UoM\UnitOfMeasure::find($this->uom);
    if ($this->product) {
        $sold = $this->product->sold->pluck('quantity')->sum();
    }
@endphp
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-bar-chart"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value text-muted d-none d-lg-flex">
            {{ $sold ?? "0,00" }} {{ $unit->name }}
        </span>
    </a>
</div>
