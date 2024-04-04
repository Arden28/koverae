@props([
    'value',
])
@php
    $transfer = Modules\Inventory\Entities\Operation\OperationTransfer::isCompany(current_company()->id)->isBelongs($this->purchase->reference)->first();
@endphp
@if($this->purchase->transfers->count() >= 1 && module('inventory'))
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-truck"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="{{ route('inventory.operation-transfers.show', ['subdomain' => current_company()->domain_name, 'transfer' => $transfer->id ?? null, 'menu' => current_menu()]) }}" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value d-none d-lg-flex">
            {{ count($this->purchase->transfers) }}
        </span>
    </a>
</div>

@endif
