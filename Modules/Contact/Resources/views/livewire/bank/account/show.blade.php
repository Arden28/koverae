<div>
    @section('title', __('Bank Account'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.bank-account-form-panel :account="$account" :event="'update-bank-account'" />
    @endsection

    <livewire:contact::form.bank-account-form :account="$account" />
</div>
