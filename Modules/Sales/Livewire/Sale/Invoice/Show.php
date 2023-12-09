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
use Modules\Sales\Entities\SalesPerson;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $sale, $invoice;

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

    public function mount(Sale $sale, Invoice $invoice){
        // dd($invoice->id, $sale->id);
        // Cart::instance('quotation')->destroy();

        Cart::instance('sale')->destroy();

        $this->invoice = $invoice;
            // Set values
            $this->customer = $invoice->customer_id;
            $this->customer_name = Contact::findOrFail($invoice->customer_id)->name;
            $this->date = $invoice->date;
            // if(isset($invoice->date)){
            //     $this->date = $invoice->date;
            // }else{
            //     today()->format('Y-m-d H:i:s');
            // }
            $this->due_date = $invoice->due_date;
            $this->payment_reference = $invoice->payment_reference;
            $this->payment_term = $invoice->payment_term;
            $this->payment_status = $invoice->payment_status;
            $this->payment_method = $invoice->payment_method;
            $this->reference = $invoice->reference;
            $this->tax_percentage = $invoice->tax_percentage;
            $this->tax_amount = $invoice->tax_amount;
            $this->discount_percentage = $invoice->discount_percentage;
            $this->shipping_amount = $invoice->shipping_amount;
            $this->total_amount = $invoice->total_amount;
            $this->paid_amount = $invoice->paid_amount;
            $this->due_amount = $invoice->total_amount;
            $this->status = $invoice->status;
            // $this->note = $invoice->note;
            $this->seller = $invoice->seller_id;
            $this->sales_team = $invoice->sales_team_id;
            $this->shipping_date = $invoice->shipping_date;
            // $this->journal_name = Journal::findOrFail($invoice->journal_id)->name;

            // Update the cart
            $invoice_details = $invoice->invoiceDetails;



            $cart = Cart::instance('sale');

            foreach ($invoice_details as $invoice_detail) {
                $cart->add([
                    'id'      => $invoice_detail->product_id,
                    'name'    => $invoice_detail->product_name,
                    'qty'     => $invoice_detail->quantity,
                    'price'   => $invoice_detail->price / 100,
                    'weight'  => 1,
                    'options' => [
                        'product_discount' => $invoice_detail->product_discount_amount / 100,
                        'product_discount_type' => $invoice_detail->product_discount_type,
                        'sub_total'   => $invoice_detail->sub_total / 100,
                        'code'        => $invoice_detail->product_code,
                        'stock'       => Product::findOrFail($invoice_detail->product_id)->product_quantity,
                        'product_tax' => $invoice_detail->product_tax_amount,
                        'unit_price'  => $invoice_detail->unit_price / 100
                    ]
                ]);

                // $cart->destroy();
            }
    }

    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        $sales_people = SalesPerson::isCompany(current_company()->id)->get();
        $sales_teams = SalesTeam::isCompany(current_company()->id)->get();
        $journals = Journal::isCompany(current_company()->id)->get();
        return view('sales::livewire.sale.invoice.show', compact('contacts', 'sales_teams', 'journals', 'sales_people'))
        ->extends('layouts.master')
        ->section('content');
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

        $this->status = 'posted';
        $this->reference = $invoice->reference;
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
            'paid_amount' => ($invoice->paid_amount + $payment->amount) / 100,
            'due_amount' => ($due_amount / 100),
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

    public function delete(Invoice $invoice){
        $sale = Sale::find($invoice->sale_id);
        $invoice->delete();

        return $this->redirect(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id]), navigate:true);
    }

    // Print Invoice
    public function print(Invoice $invoice){

        try {

            if (!$invoice) {
                throw new \Exception('Invoice not found');
            }

            $customer = Contact::findOrFail($invoice->customer_id);
            $seller = SalesPerson::findOrFail($invoice->seller->id);
            $company = current_company();

            $pdf = Pdf::loadView('sales::print-invoice', [
                'invoice' => $invoice,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            // // Store the pdf generated
            // $folderPath = "companies/{$company->name}/files/invoices";
            // $filePath = "$folderPath/$invoice->id.pdf";

            // // Check if the file already exists
            // if (Storage::exists($filePath)) {
            //     // Delete the existing file
            //     Storage::delete($filePath);
            // }

            // // Ensure the directory exists, create it if not
            // Storage::makeDirectory($folderPath);

            // // Save the PDF to the storage
            // Storage::put($filePath, $pdf->output());

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Facture - ' . str_replace('/', '_', $invoice->reference) . '.pdf'); //replace / by _

            // return response($utf8Output)->download('invoice-' . $invoice->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating invoice PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

}
