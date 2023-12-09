<div>

    @section('title', __('Equipes Commerciales'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <livewire:sales::table.sales-team-table />
        </div>
    </div>

</div>
