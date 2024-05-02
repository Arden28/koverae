<div>
    @section('title', $unbuild->reference .' - Ordres de déconstruction')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:manufacturing::navbar.control-panel.manufacturing-order-form-panel :unbuild="$unbuild" :event="'update-unbuild-order'" />
    @endsection

    <livewire:manufacturing::form.manufacturing-order-form :unbuild="$unbuild" />
</div>
