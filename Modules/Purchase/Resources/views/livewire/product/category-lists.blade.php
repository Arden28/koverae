<div>
    @section('title', 'Catégories de produits')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.product-category-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-category-table />
    </div>
</div>
