<div>
    @section('title', "Nouvel entrepôt")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.warehouse-form-panel :event="'create-warehouse'" />
    @endsection

    <livewire:inventory::form.warehouse-form />
</div>
