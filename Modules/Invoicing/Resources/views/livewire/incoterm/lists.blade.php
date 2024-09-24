<div>
    @section('title', 'Incoterms')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.incoterm-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:invoicing::table.incoterm-table />
    </div>
</div>
