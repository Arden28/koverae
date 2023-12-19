<div>
    @section('title', __($invoice->reference))

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:invoicing::form.bill-form :purchase="$purchase" :invoice="$invoice" />
</div>
