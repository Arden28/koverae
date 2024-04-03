<div>
    @section('title', "Ordres de fabrications")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.manufacturing-order-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:manufacturing::table.manufacturing-order-table />
    </div>
</div>
