<div>
    @section('title', __('Bank Accounts'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.bank-account-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:contact::table.banks-account-table />
    </div>

</div>

