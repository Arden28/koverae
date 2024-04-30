@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:manufacturing::cart.m-o-component-cart :cartInstance="'attribute'" :attribute="$this->attribute" />
    </div>
