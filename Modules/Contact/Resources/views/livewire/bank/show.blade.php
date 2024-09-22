<div>
    @section('title', $bank->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.bank-form-panel :bank="$bank" :event="'update-bank'" />
    @endsection
    
    <livewire:contact::form.bank-form :bank="$bank" />
</div>