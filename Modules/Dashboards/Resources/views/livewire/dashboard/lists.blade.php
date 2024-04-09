<div>
    @section('title', 'Tableaux de bords')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:dashboards::navbar.control-panel.dashboards-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:dashboards::table.dashboards-table />
    </div>
</div>
