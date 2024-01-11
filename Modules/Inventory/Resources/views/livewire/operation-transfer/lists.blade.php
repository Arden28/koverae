<div>
    @section('title', "Opérations de tranferts")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.operation-transfer-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.operation-transfer-table />
    </div>

</div>
