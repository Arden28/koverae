
<div>
    @section('title', $term->name)

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.payment-term-form-panel :term="$term" :event="'update-term'" />
    @endsection

    <!-- Form -->
    <livewire:invoicing::form.payment-term-form :term="$term" />
</div>
