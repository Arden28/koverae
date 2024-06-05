@props([
    'value',
    'data'
])

    <!-- Purchase Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:purchase::cart.purchase-cart :cartInstance="'purchase'" :purchase="$this->purchase" />
    </div>
