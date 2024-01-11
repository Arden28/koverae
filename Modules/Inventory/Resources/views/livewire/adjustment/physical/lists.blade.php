<div>
    @section('title', "Inventaire Physique")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.adjustment-physical-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.scrap-table />
    </div>
</div>
