<div>
    @section('title', $adjustment->reference .' - Ajustements de stock')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.adjustment-physical-form-panel :adjustment="$adjustment" :event="'update-event'" />
    @endsection

    <livewire:inventory::form.scrap-form :adjustment="$adjustment" />
</div>
