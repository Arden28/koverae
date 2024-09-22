<div>
    @section('title', __('New Bank Account'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.bank-account-form-panel :event="'create-bank-account'" />
    @endsection

    <livewire:contact::form.bank-account-form />
</div>
