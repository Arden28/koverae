@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:sales::cart.sale-cart :cartInstance="'sale'" :sale="$this->sale" />
    </div>
