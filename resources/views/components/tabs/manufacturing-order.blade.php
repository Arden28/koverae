@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:manufacturing::cart.m-o-component-cart :cartInstance="'order'" :order="$this->order" />
    </div>
