<div>
    @section('title', " Ordres de rébuts")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.scrap-panel />
    @endsection


    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:inventory::table.scrap-table />
    </div>
</div>
