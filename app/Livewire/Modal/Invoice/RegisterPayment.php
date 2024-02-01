<?php

namespace App\Livewire\Modal\Invoice;

use LivewireUI\Modal\ModalComponent;
use Modules\Contact\Entities\Contact;

use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Payment\InvoicePayment;

use Modules\Sales\Entities\SalesTeam;

use Modules\Accounting\Entities\Journal;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesPerson;

class RegisterPayment extends ModalComponent
{
    public $invoice;

    public $invoice_journal, $journal_name;

    // Payment
    public $journal, $invoice_payment_method, $amount, $payment_date, $payment_note, $payment_method;

    public function mount($invoice){
        $this->invoice = $invoice;
        $this->journal = Journal::isCompany(current_company()->id)->first()->id;
        $this->amount = $invoice['due_amount'] / 100;
        $this->payment_date = today()->format('Y-m-d');
        $this->payment_note = $invoice['payment_reference'];
    }
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        $sales_people = SalesPerson::isCompany(current_company()->id)->get();
        $sales_teams = SalesTeam::isCompany(current_company()->id)->get();
        $journals = Journal::isCompany(current_company()->id)->get();
        return view('livewire.modal.invoice.register-payment', compact('contacts', 'sales_teams', 'journals', 'sales_people'));
    }


    public function proceedPayment(Invoice $invoice){

        // $this->setPayment($invoice);

        $journal = Journal::find($this->journal);

        $year = date('Y', strtotime($this->payment_date));

        $number = InvoicePayment::isCompany(current_company()->id)->max('id') + 1;

        $reference = make_reference_with_id('P'.$journal->short_code, $number, $year);

        $payment = InvoicePayment::create([
            'company_id' => $invoice->company_id,
            'customer_invoice_id' => $invoice->id,
            'journal_id' => $this->journal,
            'amount' => $this->amount * 100,
            // 'due_amount' => $this->amount,
            'date' => $this->payment_date,
            'payment_method' => $this->payment_method,
            'reference' => $reference,
            'note' => $this->payment_note,
            'status' => 'posted',

        ]);
        $payment->save();


        $due_amount = $invoice->due_amount - $payment->amount;

        if ($due_amount == $invoice->total_amount) {
            $payment_status = 'unpaid';
        } elseif ($due_amount > 0) {
            $payment_status = 'partial';
        } else {
            $payment_status = 'paid';
        }

        $invoice->update([
            'payment_status' => $payment_status,
            'paid_amount' => ($invoice->paid_amount + $payment->amount),
            'due_amount' => ($due_amount),
        ]);

        return redirect()->route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $invoice->sale_id, 'invoice' => $invoice->id, 'menu' => current_menu()]);
    }

    public function cancelPayment(){
        $this->journal = '';
        $this->amount = '';
        $this->payment_date = '';
        $this->payment_method = '';
        $this->payment_note = '';
    }
}
