<div>
    @section('title', __($vendor->name))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.vendor-form-panel :vendor="$vendor" />
    @endsection


    <!-- Notify -->
    @include('notify::components.notify')
    <!-- Form -->

</div>
