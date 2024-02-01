<?php

namespace Modules\Invoicing\Livewire\Modal\Invoice;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Accounting\Entities\Journal;
use Modules\Invoicing\Entities\Payment\BillPayment;
use Modules\Invoicing\Entities\Vendor\Bill;

class RegisterPayment extends ModalComponent
{
    public Bill $invoice;

    public $journal, $invoice_payment_method, $amount, $payment_date, $payment_note;

    public function mount($invoice){
        $this->invoice = $invoice;

        $this->journal = $invoice->journal_id;
        // $this->invoice_payment_method = $invoice->payment_method;
        $this->amount = $invoice->due_amount / 100;
        $this->payment_date = now();
        $this->payment_note = $invoice->reference;
    }

    protected $rules = [
        'journal' => 'required|integer',
        'invoice_payment_method' => 'required|string',
        'amount' => 'required|integer',
        'payment_date' => 'required',
        'payment_note' => 'nullable|string'
    ];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
    public function render()
    {
        $journals = Journal::isCompany(current_company()->id)->get();
        return view('invoicing::livewire.modal.invoice.register-payment', compact('journals'));
    }

    // Register payment
    public function registerPayment(Bill $invoice){
        $this->validate();

        $journal = Journal::find($this->journal);

        $year = date('Y', strtotime($this->payment_date));

        $number = BillPayment::isCompany(current_company()->id)->max('id') + 1;

        $reference = make_reference_with_id('P'.$journal->short_code, $number, $year);

        $payment = BillPayment::create([
            'company_id' => $invoice->company_id,
            'supplier_bill_id' => $invoice->id,
            'journal_id' => $this->journal,
            'amount' => $this->amount * 100,
            // 'due_amount' => $this->amount,
            'date' => $this->payment_date,
            'payment_method' => $this->invoice_payment_method,
            'reference' => $reference,
            'note' => $this->payment_note,
            'status' => 'posted',

        ]);
        $payment->save();


        $due_amount = $invoice->due_amount - $payment->amount;

        if ($due_amount == $invoice->total_amount) {
            $payment_status = 'Unpaid';
        } elseif ($due_amount > 0) {
            $payment_status = 'Partial';
        } else {
            $payment_status = 'Paid';
        }

        $invoice->update([
            'payment_status' => $payment_status,
            'paid_amount' => ($invoice->paid_amount + $payment->amount),
            'due_amount' => ($due_amount),
        ]);

        return redirect()->route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $invoice->purchase_id, 'invoice' => $invoice->id, 'menu' => current_menu()]);
    }
}
