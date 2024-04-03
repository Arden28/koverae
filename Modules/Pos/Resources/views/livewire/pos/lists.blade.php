<div>
    @section('title', 'Points de ventes')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:pos::navbar.control-panel.pos-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:pos::table.pos-table />
    </div>
</div>
