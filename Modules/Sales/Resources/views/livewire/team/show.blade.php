<div>
    @section('title', $team->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:sales::navbar.control-panel.sale-team-form-panel :team="$team" :event="'update-team'" />
    @endsection

    <livewire:sales::form.sales-team-form :team="$team" />
</div>
