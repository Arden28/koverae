<div>
    @section('title', "Nouveau Conditionnement")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-packaging-form-panel :event="'create-packaging'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-packaging-form />

</div>
