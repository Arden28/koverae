<div>
    @section('title', 'Follow-up Levels')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.reminder-level-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:invoicing::table.reminder-level-table />
    </div>
</div>
