@props([
    'value',
    'data'
])

    <!-- Purchase Table -->
    <div class="tab-pane active show" id="{{ $value->key }}">
        <!-- Order Table -->
        <livewire:cart.product-cart :cartInstance="'purchase'" :data="$this->purchase"/>
    </div>
