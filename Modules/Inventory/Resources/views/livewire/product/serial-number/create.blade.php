<div>
    @section('title', "Nouveau Lots")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-serial-number-form-panel :event="'create-lot'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-serial-number-form />

</div>
