<div>
    @section('title', $bom->name .' - Nomenclatures')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.bom-form-panel :bom="$bom" :event="'update-bom'" />
    @endsection

    <livewire:manufacturing::form.bom-form :bom="$bom" />
</div>
