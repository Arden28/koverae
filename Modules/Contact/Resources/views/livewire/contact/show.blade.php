
<div>
    @section('title', $contact->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.contact-form-panel :contact="$contact"  :event="'update-contact'" />
    @endsection

    <!-- Form -->
    <livewire:contact::form.contact-form :contact="$contact" />
</div>
