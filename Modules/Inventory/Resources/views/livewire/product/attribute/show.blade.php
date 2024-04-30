<div>
    @section('title', $attribute->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-attribute-form-panel :attribute="$attribute" :event="'update-attribute'" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-attribute-form :attribute="$attribute" />

</div>
