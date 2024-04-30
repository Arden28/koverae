<div>
    @section('title', "Attributs & Variantes produits")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-attribute-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-attribute-table />
    </div>
</div>
