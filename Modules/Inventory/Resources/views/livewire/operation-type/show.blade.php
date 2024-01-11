<div>
    @section('title', $type->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.operation-type-form-panel :operation="$type" />
    @endsection

    <livewire:inventory::form.operation-type-form :type="$type" />
</div>
