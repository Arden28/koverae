<div>
    @section('title', "Historique des mouvements")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.history-move-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.product-history-movement-table />
    </div>
</div>
