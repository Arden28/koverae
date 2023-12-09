<div>
    @section('title', __('Demandes de prix'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <!-- Table -->
            <livewire:purchase::table.request-quotation-table />
        </div>
    </div>
</div>
