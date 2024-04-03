<div>
    @section('title', "Nouveau Produit")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-form-panel :event="'create-product'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-form />

</div>
