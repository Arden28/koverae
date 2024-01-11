<div>
    @section('title', "Emplacements")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.location-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.location-table />
    </div>
</div>
