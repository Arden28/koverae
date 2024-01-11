<div>
    @section('title', $workplace->title)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:employee::navbar.control-panel.workplace-form-panel :workplace="$workplace" />
    @endsection
    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:employee::form.workplace-form :workplace="$workplace" />
</div>
