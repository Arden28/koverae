<div>
    @section('title', __('Comptes bancaires'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <!-- Table -->
            <livewire:contact::table.banks-account-table />
        </div>
    </div>
</div>
