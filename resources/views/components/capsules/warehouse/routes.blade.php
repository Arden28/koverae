@props([
    'value',
])
<!-- Routes -->
<a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('inventory.warehouses.routes.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" >
    <div class="form-check k_radio_item" id="capsule">
        <i class="k_button_icon bi bi-signpost"></i>
        <span class="k_horizontal_span">{{ $value->label }}</span>
    </div>
</a>
