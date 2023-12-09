<div>
    @section('title', __('Nouvelle demande de prix'))

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::order.request.create-form />
</div>
