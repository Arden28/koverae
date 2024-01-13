<div>
    @section('title', $reference)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-form-panel :sale="$sale" :event="'update-sale'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:sales::form.sale-form :sale="$sale"/>

</div>
