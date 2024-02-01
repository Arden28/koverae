<div>
    @section('title', "Nouveau transfert")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.operation-transfer-form-panel :event="'create-transfer'" />
    @endsection

    <livewire:inventory::form.operation-transfer-form />
</div>
