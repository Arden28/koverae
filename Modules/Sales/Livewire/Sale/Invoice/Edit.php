<?php

namespace Modules\Sales\Livewire\Sale\Invoice;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Payment\InvoicePayment;
use Modules\Invoicing\Entities\Customer\InvoiceDetails;
use Modules\Sales\Entities\SalesTeam;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Accounting\Entities\Journal;
use Modules\Sales\Entities\Sale;

class Edit extends Component
{
    public Sale $sale;
    public Invoice $invoice;

    public $listeners = ['payInvoiceModal'];

    public $cartInstance = 'sale';

    public $customer, $customer_name, $customer_reference, $bank_account,

    $date,

    $due_date,

    $payment_term ,
    $reference,
    $payment_reference,
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $discount_amount,
    $shipping_amount,
    $shipping_date,
    $paid_amount,
    $due_amount,
    $total_amount,
    $payment_method,
    $payment_status,
    $status,
    $terms,

    $seller,

    $sellers = [],

    $sales_team;

    public $invoice_journal, $journal_name;

    // Payment
    public $journal, $invoice_payment_method, $amount, $payment_date, $payment_note;


    public function render()
    {
        return view('sales::livewire.sale.invoice.edit')
        ->extends('layouts.master');
    }

    // Update Invoice
    public function updateInvoice(Invoice $invoice){
        // $this->validate();

        $due_amount = (float)$invoice->due_amount - (float)$this->amount;

        if ($due_amount == $invoice->total_amount) {
            $payment_status = 'Unpaid';
        } elseif ($due_amount > 0) {
            $payment_status = 'Partial';
        } else {
            $payment_status = 'Paid';
        }

        $invoice->update([
            'customer_id' => $this->customer,
            'customer_reference' => $this->customer_reference,
            'date' => $this->date,
            'due_date' => $this->due_date,
            'shipping_date' => $this->shipping_date,
            'payment_term' => $this->payment_term,
            'payment_reference' => $this->payment_reference,
            'payment_status' => $payment_status,
            'seller_id' => $this->seller,
            // 'journal_id' => $this->journal,
            'terms' => $this->terms,
            'bank_account_id' => $this->bank_account
        ]);
        $invoice->save();
    }
    public function confirm(Invoice $invoice){

        $year = date('Y', strtotime($this->date));

        $number = Invoice::isCompany(current_company()->id)->max('id') + 1;
        $reference = make_reference_with_id('INV', $number, $year);

        $invoice->update([
            'reference' => $reference,
            'status' => 'posted',
            'payment_reference' => $reference,
        ]);
        $invoice->save();

        $this->reference = $invoice->reference;
        $this->status = $invoice->status;
        $this->payment_reference = $invoice->payment_reference;

    }

    public function draft(Invoice $invoice){
        $invoice->update([
            'status' => 'draft',
        ]);
        $invoice->save();

        $this->status = $invoice->status;
    }

    public function canceled(Invoice $invoice){

        $invoice->update([
            'status' => 'canceled',
        ]);
        $invoice->save();

        $this->status = 'canceled';

    }

    // Payment
    // public function proceedPayment(){
    //     $this->dispatch('showPayInvoiceModal');
    // }
    public function setPayment(Invoice $invoice){

        $this->amount = $invoice->due_amount / 100;

        $this->payment_date = today()->format('Y-m-d');
        $this->payment_note = $this->payment_reference;

        // A modifier une fois le moyen de paiment ajouté au journal

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
            'paid_amount' => ($invoice->paid_amount + $this->amount) * 100,
            'due_amount' => $due_amount,
        ]);

        return $this->redirect(route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $invoice->sale_id, 'invoice' => $invoice->id]), navigate:true);
    }

    public function cancelPayment(){
        $this->journal = '';
        $this->amount = '';
        $this->payment_date = '';
        $this->payment_method = '';
        $this->payment_note = '';
    }
}
