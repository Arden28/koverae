@props([
    'value',
])
@if($this->sale->invoice->count() >= 1)
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-receipt"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $sale->invoice->id, 'menu' => current_menu()]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value">
            1
        </span>
    </a>
</div>

@endif
