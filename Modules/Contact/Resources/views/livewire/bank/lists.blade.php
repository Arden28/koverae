<div>
    @section('title', __('Banks'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.bank-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.banks-table />
    </div>

</div>
