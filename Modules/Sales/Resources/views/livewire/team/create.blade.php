<div>
    @section('title', __('translator::sales.form.team.page-title-new'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-team-form-panel :event="'create-team'" />
    @endsection

    <livewire:sales::form.sales-team-form />
</div>
