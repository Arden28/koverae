<div>
    @section('title', __('Etiquettes'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.tag-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.tag-table />
    </div>
</div>
