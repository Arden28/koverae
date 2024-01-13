<div>

    @section('title', __('Titres honorifiques'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.honorific-title-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.honorific-title-table />
    </div>

</div>
