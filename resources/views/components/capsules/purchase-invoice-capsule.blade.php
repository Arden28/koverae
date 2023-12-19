@props([
    'value',
    'status'
])
@if($this->invoice)
<!-- Invoice -->
<div class="form-check k_radio_item">
    <i class="k_button_icon bi bi-receipt-cutoff"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $this->purchase->id, 'invoice' => $this->invoice]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
    </a>
</div>
@endif
