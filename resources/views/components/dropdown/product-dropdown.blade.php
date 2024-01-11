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
    :model="'Modules\Inventory\Entities\Product'"
    :searchAttributes="['product_name', 'product_code']"
    :additionalCriteria="['status' => 'active']"
    :event="'product-selected'"/>
</div>
