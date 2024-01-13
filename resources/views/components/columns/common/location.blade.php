@props([
    'value',
    'id'
])
@php
    $location = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::find($value);
    $parent = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::find($location->parent_id);
@endphp

<div>
    <a style="text-decoration: none" wire:navigate href="{{ $this->showRoute($id) }}"  tabindex="-1">
        @if(isset($parent))
            {{ $parent->name }}/{{ $location->name }}
        @else
            {{ $location->name }}
        @endif
    </a>
</div>
