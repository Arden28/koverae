<div>
    @section('title', "Lieux de travail")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.workplace-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:employee::table.workplace-table />
    </div>
</div>
