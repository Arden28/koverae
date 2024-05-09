@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active {{ $value->condition === false ? 'd-none' : '' }}" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:inventory::cart.product-attribute-value-cart :cartInstance="'attribute'" :attribute="$this->attribute" />
    </div>
