<div>
    @section('title', __('translator::inventory.form.product.page-title-new'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-form-panel :event="'create-product'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-form />

</div>
