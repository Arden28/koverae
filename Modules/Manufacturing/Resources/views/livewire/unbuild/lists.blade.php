<div>
    @section('title', "Ordres de déconstruction")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.unbuild-order-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:manufacturing::table.unbuild-order-table />
    </div>
</div>
