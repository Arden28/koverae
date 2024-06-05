@props([
    'value',
])
<!-- Bom -->
@if($this->product && $this->product->bom)
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-thermometer"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value d-none d-lg-flex">
            1 {{ __('Bom') }}
        </span>
    </a>
</div>
@endif
