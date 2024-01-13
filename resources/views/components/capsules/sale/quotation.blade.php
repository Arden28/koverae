@props([
    'value',
])
@if($this->sale->quotation->count() >= 1 && module('inventory'))
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-newspaper"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $this->sale->quotation_id]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value">
            1
        </span>
    </a>
</div>

@endif
