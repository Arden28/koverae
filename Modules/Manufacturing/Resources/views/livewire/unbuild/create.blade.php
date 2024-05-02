<div>
    @section('title', "Nouvel ordre de déconstruction")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.manufacturing-order-form-panel :event="'create-unbuild-order'" />
    @endsection

    <livewire:manufacturing::form.manufacturing-order-form />
</div>
