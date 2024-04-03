@props([
    'value',
    'status'
])
@if($this->sale->invoice)
<!-- Ventes -->
<div class="form-check k_radio_item p-2" id="capsule">
    <i class="k_button_icon bi bi-receipt"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate  wire:navigate href="{{ route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $this->sale->id, 'invoice' => $this->sale->invoice->id, 'menu' => current_menu()]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value text-muted">
            1
        </span>
    </a>
</div>
@endif
