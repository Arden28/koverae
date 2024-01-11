<div>
    @section('title', "Types d'opérations")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.operation-type-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.operation-type-table />
    </div>

</div>
