@props([
    'value',
    'status'
])
@if(count($sales) >= 1)
<!-- Invoice -->
<div class="form-check k_radio_item">
    <i class="k_button_icon bi bi-pencil-square"></i>
    <a style="text-decoration: none;" wire:navigate href="{{ route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $quotation->sale->id, 'menu' => current_menu()]) }}">
        <span class="k_horizontal_span">{{ __('Ventes') }} (1)</span>
    </a>
</div>
@endif
