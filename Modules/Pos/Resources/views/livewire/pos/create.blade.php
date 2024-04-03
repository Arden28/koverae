<div>
    @section('title', "Nouveau")

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:pos::navbar.control-panel.pos-form-panel :event="'create-pos'" />
    @endsection

    <livewire:pos::form.pos-form/>
</div>
