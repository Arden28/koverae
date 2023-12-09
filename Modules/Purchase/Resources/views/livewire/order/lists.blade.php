<div>
    @section('title', __('Bon de commande fournisseur'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <!-- Table -->
            <livewire:purchase::table.purchase-table />
        </div>
    </div>
</div>
