<div>

    @section('title', __('Industries'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.industry-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.industries-table />
    </div>

</div>
