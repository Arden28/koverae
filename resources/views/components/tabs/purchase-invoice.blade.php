@props([
    'value',
    'data',
])
    <!-- Order Table -->
    <div class="tab-pane active show" id="{{ $value->key }}">
        <!-- Order Table -->
        <livewire:cart.product-cart :cartInstance="'purchase'" :data="$this->invoice"/>
    </div>
