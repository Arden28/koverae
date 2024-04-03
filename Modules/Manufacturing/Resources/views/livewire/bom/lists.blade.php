<div>
    @section('title', "Nomenclatures des produits")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.bom-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:manufacturing::table.bom-table />
    </div>
</div>
