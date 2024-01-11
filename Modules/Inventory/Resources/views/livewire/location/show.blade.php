<div>
    @section('title', $location->name .' - Emplacements')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.location-form-panel :location="$location" />
    @endsection

    <livewire:inventory::form.location-form :location="$location" />
</div>
