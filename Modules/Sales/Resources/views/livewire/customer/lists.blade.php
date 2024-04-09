<div>
    @section('title', 'Clients')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.cutsomer-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        {{-- <livewire:contact::table.customers-table /> --}}
        <livewire:contact::table.contacts-table />
    </div>
</div>
