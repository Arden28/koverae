<div>
    @section('title', __($pricelist->name))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.pricelist-form-panel :pricelist="$pricelist" :event="'update-pricelist'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:sales::form.pricelist-form :pricelist="$pricelist" />
</div>
