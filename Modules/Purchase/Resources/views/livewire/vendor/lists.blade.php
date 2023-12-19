<div>
    @section('title', 'Fournisseurs')
    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')

            <livewire:contact::table.suppliers-table />

        </div>
    </div>
</div>
