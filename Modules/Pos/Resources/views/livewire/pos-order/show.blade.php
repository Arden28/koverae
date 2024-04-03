<div>
    @section('title', $order->reference)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:pos::navbar.control-panel.pos-form-panel :order="$order" :event="'update-order'" />
    @endsection

    <livewire:pos::form.pos-form :order="$order" />
</div>
