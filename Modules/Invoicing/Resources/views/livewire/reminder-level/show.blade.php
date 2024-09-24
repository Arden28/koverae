
<div>
    @section('title', $level->description)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.reminder-level-form-panel :level="$level" :event="'update-level'" />
    @endsection

    <!-- Form -->
    <livewire:invoicing::form.follow-up-level-form :level="$level" />
</div>
