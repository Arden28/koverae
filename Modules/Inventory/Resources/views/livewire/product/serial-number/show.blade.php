<div>
    @section('title', $lot->reference)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.product-serial-number-form-panel :event="'update-lot'" :lot="$lot" />
    @endsection

    <!-- Form -->
    <livewire:inventory::form.product-serial-number-form :lot="$lot" />

</div>
