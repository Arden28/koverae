<div>
    @section('title', __($purchase->reference))

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.purchase-form :purchase="$purchase" />
</div>
