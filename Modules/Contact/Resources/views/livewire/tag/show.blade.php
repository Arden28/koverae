<div>
    @section('title', $tag->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.tag-form-panel :tag="$tag" :event="'update-contact-tag'"/>
    @endsection

    <livewire:contact::form.contact-tag-form :tag="$tag" />
</div>
