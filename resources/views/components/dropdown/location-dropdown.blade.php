@props([
    'value',
    'index',
    'input',
])

<div>
    <livewire:search.dynamic-search-dropdown
    :key="$input"
    :index="$index"
    :value="collect($value)->except('type')->all()"
    :model="'Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation'"
    :searchAttributes="['name', 'type']"
    :additionalCriteria="[]"
    :event="'location-selected'"/>
</div>
<!-- Exclude 'type' property -->
