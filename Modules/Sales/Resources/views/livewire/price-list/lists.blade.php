<div>
    @section('title', 'Listes de prix')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.pricelist-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:sales::table.pricelist-table />
    </div>
</div>
