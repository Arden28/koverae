<div>
    @section('title', __('New Label'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.tag-form-panel :event="'create-contact-tag'"/>
    @endsection
    <livewire:contact::form.contact-tag-form />
</div>
