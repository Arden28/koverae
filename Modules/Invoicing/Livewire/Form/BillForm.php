<?php

namespace Modules\Invoicing\Livewire\Form;

use Livewire\Component;
use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;

use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Invoicing\Entities\Vendor\Bill;
use Modules\Purchase\Entities\Purchase;

class BillForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $purchase, $invoice;

    public $model;

    public $cartInstance = 'purchase';

    public $supplier, $supplier_name, $supplier_reference, $bank_account,

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
    $buyer,
    $buyers = [];

    public $invoice_journal, $journal_name;

    // Payment
    public $journal, $invoice_payment_method, $amount, $payment_date, $payment_note;

    public function mount(Purchase $purchase, Bill $invoice){

        $this->purchase = $purchase;
        $this->invoice = $invoice;
        $this->model = $invoice;

        $this->date = $invoice->date;
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
        $this->supplier = $invoice->supplier_id;
        $this->buyer = $invoice->buyer_id;

        // Update the cart
        $bill_details = $invoice->billDetails;

        Cart::instance('purchase')->destroy();

        $cart = Cart::instance('purchase');

        foreach ($bill_details as $invoice_detail) {
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

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('supplier','Forunisseur', 'select', 'supplier', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('supplier_reference','Référence fournisseur', 'supplier_reference', 'text', 'left', 'none', 'none'),

            Input::make('date','Date', 'datetime-local', 'date', 'right', 'none', 'none'),
            Input::make('payment_reference','Paiement', 'text', 'payment_reference', 'right', 'none', 'none', 'none', 'Référence de paiement'),
            // Input::make('receipt_bank','Compte bancaire', 'text', 'receipt_bank_date', 'right', 'none', 'none'),
            Input::make('payment_term','Modalité de paiement', 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),


            Input::make('fiscal_position','Position fiscale', 'text', 'fiscal_position', '', 'other', 'accounting'),


        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('invoice','Lignes de facture')->component('tabs.purchase-invoice'),
            Tabs::make('other','Autres Informations'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('accounting','Comptabilité', 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('payment', 'Enregistrer un paiement', 'confirmInv', 'posted')->component('button.action-bar.register-invoice-payment'),
            ActionBarButton::make('confirm', 'Confirmer', 'confirmInv', 'draft')->component('button.action-bar.confirm-invoice'),
            ActionBarButton::make('refunds', 'Remboursement', "", ''),
            ActionBarButton::make('cancel', 'Annuler', 'cancel', '')->component('button.action-bar.cancel'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['payment', 'confirm', 'refunds', 'cancel']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', 'Brouillon', 'draft'),
            StatusBarButton::make('posted', 'Comptabilisé', 'posted'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    public function capsules() : array
    {
        return [
            // Add more buttons as needed
        ];
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> Imprimer', 'print()'),
            ActionButton::make('duplicate', 'Dupliquer', 'duplicate'),
            ActionButton::make('delete', 'Supprimer', 'delete'),
            ActionButton::make('payment_link', 'Générer un lien de paiement', ''),
            // Add more buttons as needed
        ];
    }

    public function form() : string
    {
        return 'UpdateINV()';
    }

    public function confirmInv(){
        $invoice = Bill::find($this->invoice->id);

        $invoice->update([
            'status' => 'posted',
            'payment_reference' => $this->reference,
        ]);
        $invoice->save();

        $this->status = 'posted';
        $this->payment_reference = $invoice->payment_reference;

        return $this->redirect(route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $invoice->purchase_id, 'invoice' => $invoice->id]), navigate:true);
    }

    // Cancel the invoice
    public function cancel(){

        $invoice = Bill::find($this->invoice->id);

        $invoice->update([
            'status' => 'canceled',
        ]);
        $invoice->save();

        $this->status = 'canceled';

        return $this->redirect(route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $invoice->purchase_id, 'invoice' => $invoice->id]), navigate:true);
    }

    // Cancel the invoice
    public function draft(){

        $invoice = Bill::find($this->invoice->id);

        $invoice->update([
            'status' => 'canceled',
        ]);
        $invoice->save();

        $this->status = 'canceled';

        return $this->redirect(route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $invoice->purchase_id, 'invoice' => $invoice->id]), navigate:true);
    }

}
