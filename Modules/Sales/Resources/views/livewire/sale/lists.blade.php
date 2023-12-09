<div>
    @section('title', __('Bon de commandes'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <livewire:sales::table.sales-table />
        </div>
    </div>

</div>
