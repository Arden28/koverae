@props([
    'value',
    'data'
])

    <!-- Purchase Table -->
    <div class="tab-pane active show" id="{{ $value->key }}">
        <!-- Order Table -->
        <livewire:purchase::cart.request-quotation-cart :cartInstance="'request-quotation'" :request="$this->request" />
    </div>
