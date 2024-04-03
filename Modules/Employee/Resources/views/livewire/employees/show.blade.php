<div>
    @section('title', $employee->user->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.employee-form-panel :employee="$employee" :event="'update-employee'" />
    @endsection

    <livewire:employee::form.employe-form :employee="$employee" />
</div>
