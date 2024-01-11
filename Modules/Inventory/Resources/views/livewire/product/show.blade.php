<div>
    @section('title', $product->product_name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-form-panel :product="$product" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-form :product="$product" />

</div>
