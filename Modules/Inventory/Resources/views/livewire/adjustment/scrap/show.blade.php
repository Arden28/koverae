<div>
    @section('title', $scrap->reference .' - Rebuts')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.scrap-form-panel :scrap="$scrap" />
    @endsection

    <livewire:inventory::form.scrap-form :scrap="$scrap" />
</div>
