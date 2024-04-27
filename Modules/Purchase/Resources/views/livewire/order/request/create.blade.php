<div>
    @section('title', __('Nouvelle demande de prix'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.request-quotation-form-panel :event="'create-request'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.request-quotation-form />
</div>
