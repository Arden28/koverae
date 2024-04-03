<div>
    @section('title', 'Commandes')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:pos::navbar.control-panel.pos-order-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:pos::table.pos-order-table />
    </div>
</div>
