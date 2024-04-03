<div>
    @section('title', $pos->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:pos::navbar.control-panel.pos-form-panel :pos="$pos" :event="'update-pos'" />
    @endsection

    <livewire:pos::form.pos-form :pos="$pos" />
</div>
