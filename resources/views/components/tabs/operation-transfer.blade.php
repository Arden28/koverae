@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:inventory::cart.operation-detail-cart :cartInstance="'transfer'" :transfer="$this->transfer" />
    </div>
