@props([
    'value'
])
@php
    $location = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::find($value);
@endphp
@if($location)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('inventory.locations.show' , ['subdomain' => current_company()->domain_name, 'location' => $location->id ]) }}"  tabindex="-1">
        {{ $location->name }}
    </a>
</div>
@endif
