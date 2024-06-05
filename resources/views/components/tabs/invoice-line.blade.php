@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:invoicing::cart.invoice-cart :cartInstance="'invoice'" :invoice="$this->invoice"/>
    </div>

