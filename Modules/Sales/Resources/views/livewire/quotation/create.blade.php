<div>
    @section('title', __('Nouveau devis'))

    <!-- Notify -->
    @include('notify::components.notify')

    <livewire:sales::form.quotation-form />
</div>
