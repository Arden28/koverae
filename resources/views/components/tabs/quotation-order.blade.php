@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:cart.product-cart :cartInstance="'quotation'" :data="$this->quotation"/>
    </div>
