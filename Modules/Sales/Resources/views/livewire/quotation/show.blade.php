<div>

    @section('title', $quotation->reference)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.quotation-form-panel :quotation="$quotation" :event="'update-quotation'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:sales::form.quotation-form :quotation="$quotation"/>
</div>
