<div>
    @section('title', "Employés")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.employee-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:employee::table.employees-table />
    </div>
</div>
