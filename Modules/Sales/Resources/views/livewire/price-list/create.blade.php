<div>
    @section('title', __('Nouvelle liste de prix'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.pricelist-form-panel :event="'create-pricelist'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:sales::form.pricelist-form />
</div>
