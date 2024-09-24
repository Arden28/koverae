
<div>
    @section('title', __('New Follow-up Level'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.reminder-level-form-panel :event="'create-level'" />
    @endsection

    <!-- Form -->
    <livewire:invoicing::form.follow-up-level-form />
</div>
