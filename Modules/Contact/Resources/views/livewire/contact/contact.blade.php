<div>
    @section('title', 'Contacts')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.contact-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.contacts-table />
    </div>
</div>
