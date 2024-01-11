<div>
    @section('title', "Départements")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.department-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:employee::table.department-table />
    </div>
</div>
