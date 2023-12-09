@props([
    'value',
    'status'
])
@if($this->sale)
<!-- Invoice -->
<div class="form-check k_radio_item">
    <i class="k_button_icon bi bi-pencil-square"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $this->sale]) }}" >
        <span class="k_horizontal_span">{{ __('Vente(s)') }}</span>
    </a>
</div>
@endif
