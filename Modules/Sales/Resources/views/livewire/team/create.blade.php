<div>
    @section('title', __('Nouvelle équipe commerciale'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-team-form-panel />
    @endsection

    <livewire:sales::form.sales-team-form />
</div>
