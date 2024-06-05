<div>

    @section('title', __('translator::sales.form.team.page-title-list'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-team-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:sales::table.sales-team-table />
    </div>

</div>
