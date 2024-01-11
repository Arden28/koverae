<div>
    @section('title', __('Nouveau fournisseur'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.vendor-form-panel />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <!-- Form -->
</div>
