@props([
    'value',
])
@php
    $unit = \Modules\Inventory\Entities\UoM\UnitOfMeasure::find($this->uom);
    if ($this->product) {
        $bought = $this->product->bought->pluck('quantity')->sum();
    }
@endphp
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-credit-card"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value">
            {{ $bought ?? "0,00" }} {{ $unit->name }}
        </span>
    </a>
</div>
