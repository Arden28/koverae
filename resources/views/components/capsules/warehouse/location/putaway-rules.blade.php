@props([
    'value',
])
<!-- Putaway Rules -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-shuffle"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value">
            <span class=" text-muted d-none d-lg-flex">0 stratégie</span>
        </span>
    </a>
</div>

