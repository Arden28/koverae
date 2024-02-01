@if($payment_status == 'unpaid' || $payment_status == '')
<button type="button" wire:click="setPayment({{ $invoice->id }})" data-bs-toggle="modal" data-bs-target="#payInvoiceModal" id="top-button" class="btn btn-dark primary {{ $payment_status != 'Paid' ? '' : 'd-none' }}">
    <span>
        {{ __('Enregistrer un paiement') }}
    </span>
</button>
@elseif($payment_status == 'Partial')
<button type="button" wire:click="setPayment({{ $invoice->id }})" data-bs-toggle="modal" data-bs-target="#payInvoiceModal" id="top-button" class="btn btn-dark primary {{ $payment_status != 'Paid' ? '' : 'd-none' }}">
    <span>
        {{ __('Ajouter un paiement') }}
    </span>
</button>

@endif
