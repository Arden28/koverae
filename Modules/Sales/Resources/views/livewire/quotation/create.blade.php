<div>
    @section('title', __('Nouveau devis'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.quotation-form-panel :event="'create-quotation'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:sales::form.quotation-form />
</div>
