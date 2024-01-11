<div>
    @section('title', "Entrepôts")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.warehouse-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.warehouse-table />
    </div>
</div>
