
<div>
    @section('title', __('New Payment Term'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.payment-term-form-panel :event="'create-term'" />
    @endsection

    <!-- Form -->
    <livewire:invoicing::form.payment-term-form />
</div>
