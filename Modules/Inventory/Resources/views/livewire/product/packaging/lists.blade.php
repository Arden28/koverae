<div>
    @section('title', "Conditionnements de produits")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-packaging-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-packaging-table />
    </div>
</div>
