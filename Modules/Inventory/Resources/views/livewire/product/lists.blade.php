<div>
    @section('title', __('translator::inventory.form.product.page-title-list'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.products-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-table />
    </div>
</div>
