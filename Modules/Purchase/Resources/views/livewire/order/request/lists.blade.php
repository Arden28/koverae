<div>
    @section('title', __('Demandes de prix'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.request-quotation-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:purchase::table.request-quotation-table />
    </div>

</div>
