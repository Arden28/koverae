<div>
    @section('title', $job->title)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.job-form-panel :job="$job" />
    @endsection

    @include('notify::components.notify')
    <livewire:employee::form.job-form :job="$job" />
</div>
