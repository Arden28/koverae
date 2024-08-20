<div>
    @section('title', __('translator::sales.page.sales-analysis.title'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:sales::table.sales-table />
    </div>

</div>
