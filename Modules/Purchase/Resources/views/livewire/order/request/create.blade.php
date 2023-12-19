<div>
    @section('title', __('Nouvelle demande de prix'))

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.request-quotation-form />
</div>
