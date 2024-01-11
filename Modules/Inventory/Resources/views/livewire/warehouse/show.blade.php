<div>
    @section('title', $warehouse->name .' - Entrepôts')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.warehouse-form-panel :warehouse="$warehouse" />
    @endsection

    <livewire:inventory::form.warehouse-form :warehouse="$warehouse" />
</div>
