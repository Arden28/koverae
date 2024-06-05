<div>
    @section('title', __('translator::sales.form.quotation.page-title-new'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.quotation-form-panel :event="'create-quotation'" />
    @endsection

    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:sales::form.quotation-form />
</div>
