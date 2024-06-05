<div>
    @section('title', __('translator::sales.form.quotation.page-title-list'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.quotation-panel />
    @endsection

    <div class="w-100 d-print-none">
        <!-- Notify -->
        @include('notify::components.notify')
        <!-- Table -->
        <livewire:sales::table.quotations-table />
    </div>
</div>
