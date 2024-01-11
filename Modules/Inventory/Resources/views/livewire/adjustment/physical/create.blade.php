<div>
    @section('title', "Ajuster l'inventaire")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.adjustment-physical-form-panel />
    @endsection

    <livewire:inventory::form.physical-adjustment-form />
</div>
