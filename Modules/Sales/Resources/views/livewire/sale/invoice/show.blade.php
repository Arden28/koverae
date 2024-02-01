<div>
    @section('title', $invoice->reference)

    <livewire:invoicing::navbar.control-panel.invoice-form-panel :invoice="$invoice" :event="'update-invoice'" />

    <!-- Notify -->
    @include('notify::components.notify')
    <!-- Form -->
    <livewire:invoicing::form.invoice-form :sale="$sale" :invoice="$invoice" />
    {{-- @include('sales::livewire.sale.invoice.includes.invoice-payment-modal') --}}
</div>
