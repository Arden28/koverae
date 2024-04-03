<div>
    @section('title', __($program->name))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sales-program-form-panel :program="$request" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:sales::form.sales-program-form :program="$program" />
</div>
