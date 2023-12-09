<div>
    @section('title', __('Banques'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <!-- Table -->
            <livewire:contact::table.banks-table />
        </div>
    </div>
</div>
