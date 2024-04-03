<div>
    @section('title', "Nomenclature")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.bom-form-panel :event="'create-bom'" />
    @endsection

    <livewire:manufacturing::form.bom-form />
</div>
