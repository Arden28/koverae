<div>
    @section('title', 'Payment Terms')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.payment-term-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:invoicing::table.payment-term-table />
    </div>
</div>
