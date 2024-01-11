<div>
    @section('title', "Postes de travail")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.job-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:employee::table.job-table />
    </div>
</div>
