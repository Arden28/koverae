<div>
    @section('title', "Nouvel Attribut")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-attribute-form-panel :event="'create-attribute'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-attribute-form />

</div>
