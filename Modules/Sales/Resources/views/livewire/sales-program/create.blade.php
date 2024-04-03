<div>
    @section('title', __('Nouveau'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sales-program-form-panel />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:sales::form.sales-program-form />
</div>
