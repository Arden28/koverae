<div>
    @section('title', $packaging->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-packaging-form-panel :packaging="$packaging" :event="'update-packaging'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-packaging-form :packaging="$packaging" />

</div>
