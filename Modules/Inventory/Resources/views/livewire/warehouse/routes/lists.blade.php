<div>
    @section('title', "Routes - Entrepôts")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.route-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.warehouse-route-table />
    </div>

</div>
