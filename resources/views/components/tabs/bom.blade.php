@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:manufacturing::cart.bom-component-cart :cartInstance="'bom'" :bom="$this->bom" />
    </div>
