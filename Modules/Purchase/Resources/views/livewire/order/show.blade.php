<div>
    @section('title', __($purchase->reference))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.purchase-form-panel :purchase="$purchase" />
    @endsection


    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.purchase-form :purchase="$purchase" />
</div>
