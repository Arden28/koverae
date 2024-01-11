<div>
    @section('title', $route->name .' - Entrepôts')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:inventory::navbar.control-panel.route-form-panel :route="$route" />
    @endsection

    <livewire:inventory::form.warehouse-route-form :route="$route" />
</div>
