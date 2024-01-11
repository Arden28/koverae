<div>
    @section('title', 'Fournisseurs')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.vendor-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.suppliers-table />
    </div>
</div>
