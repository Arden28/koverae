<div>
    @section('title', $order->reference .' - Ordres de fabrication')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.manufacturing-order-form-panel :order="$order" :event="'update-manufacturing-order'" />
    @endsection

    <livewire:manufacturing::form.manufacturing-order-form :order="$order" />
</div>
