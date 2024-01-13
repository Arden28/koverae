<div>
    @section('title', __('Pays'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.country-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.country-table />
    </div>

</div>
