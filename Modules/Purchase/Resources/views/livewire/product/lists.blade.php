<div>
    @section('title', 'Produits')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.product-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-table />
    </div>
</div>
