<div>
    @section('title', 'Nouvel employé')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.employee-form-panel :event="'create-employee'" />
    @endsection

    <livewire:employee::form.employe-form />
</div>
