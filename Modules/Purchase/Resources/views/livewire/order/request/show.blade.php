<div>
    @section('title', __($request->reference))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:purchase::navbar.control-panel.request-quotation-form-panel :request="$request" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.request-quotation-form :request="$request" />
</div>
