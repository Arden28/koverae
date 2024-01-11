<div>
    @section('title', __('Bon de commande fournisseur'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.purchase-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:purchase::table.purchase-table />
    </div>
</div>
