<div>
    @section('title', $transfer->reference)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.operation-transfer-form-panel :transfer="$transfer" />
    @endsection

    <livewire:inventory::form.operation-transfer-form :transfer="$transfer" />
</div>
