
<div>
    @section('title', __('New Contact'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.contact-form-panel :event="'create-contact'" />
    @endsection

    <!-- Form -->
    <livewire:contact::form.contact-form />
</div>
