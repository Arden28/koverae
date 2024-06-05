<div>
    @section('title', __('translator::inventory.form.product-category.page-title-new'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-category-form-panel :event="'create-category'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.category-form />

</div>
