@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="show" id="{{ $value->key }}" wire:ignore>
        <!-- Order Table -->
        <livewire:inventory::cart.physical-adjustment-cart />
        {{-- <livewire:cart.simple-cart :cartInstance="'sale'"/> --}}
    </div>
