<?php

namespace Modules\Sales\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class SalesSetting extends AppSetting
{
    public $setting, $company;
    public bool $variant, $uom, $package, $email_delivery, $discount, $sale_program, $margin, $sale_warnings, $lock_confirmed_sales, $has_pro_format_invoice, $has_shipping_cost, $has_pricelist, $has_online_signature, $has_online_payment, $has_automatic_invoice;
    public $customer_account, $pricelist, $invoice_policy, $down_payment;
    public array $customerAccountOptions = [], $invoicingPolicyOptions = [];

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        $this->setting = $setting;
        $this->variant = $setting->has_variant;
        $this->uom = $setting->has_uom;
        $this->package = $setting->has_packaging;
        $this->email_delivery = $setting->send_mail_after_confirmation;
        $this->discount = $setting->has_discount;
        $this->sale_program = $setting->has_sale_program;
        $this->margin = $setting->has_margin;
        $this->customer_account = $setting->has_customer_account;
        $this->has_pricelist = $setting->has_pricelist_check;
        $this->pricelist = $setting->pricelist;
        $this->sale_warnings = $setting->has_sale_warnings;
        $this->lock_confirmed_sales = $setting->lock_confirmed_sales;
        $this->has_pro_format_invoice = $setting->has_pro_format_invoice;
        $this->has_shipping_cost = $setting->has_shipping_cost;
        $this->invoice_policy = $setting->has_invoice_policy;
        $this->has_automatic_invoice = $setting->has_automatic_invoice;
        $this->down_payment = $setting->down_payment;
        $this->has_online_signature = $setting->has_online_signature;
        $this->has_online_payment = $setting->has_online_payment;
        $customerAccount = [
            ['id' => 'on_invitation', 'label' => __('On Invitation')],
            ['id' => 'free_signup', 'label' => __('Free Signup')],
        ];
        $this->customerAccountOptions = toRadioOptions($customerAccount, 'id', 'label', 'free_signup');
        $invoicingPolicies = [
            ['id' => 'ordered', 'label' => __('Invoice what is ordered')],
            ['id' => 'delivered', 'label' => __('Invoice what is delivered')],
        ];
        $this->invoicingPolicyOptions = toRadioOptions($invoicingPolicies, 'id', 'label', 'ordered');
    }

    public function blocks() : array
    {
        return [
            Block::make('product_catalog', 'Products Catalog'),
            Block::make('pricing', 'Pricing'),
            Block::make('quotation', 'Orders & Quotations'),
            Block::make('delivery', 'Shipping'),
            Block::make('invoicing', 'Invoicing'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // $key, $label, $model, $description, $block, $checkbox, $help

            // Catalog
            Box::make('variant', 'Products Variants', 'variant', "Sell ​​variants of a product using attributes (size, color, etc.)", 'product_catalog', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('uom', 'Units of Measure', 'uom', "Sell and purchase products in different units of measure", 'product_catalog', true),
            Box::make('package', 'Product Packagings', 'package', "Sell products by multiple of unit # per package", 'product_catalog', true),
            Box::make('email_delivery', 'Deliver Content by Email', 'email_delivery', "Send a product-specific email once the invoice is validated", 'product_catalog', true),
            // Pricing
            Box::make('discount', 'Discounts', 'discount', "Granting discounts on sales order lines", 'pricing', true),
            Box::make('sale_program', 'Discounts, Loyalty and Gift Card', 'sale_program', "Manage Promotions, Coupons, Loyalty cards, Gift cards & eWallet", 'pricing', true),
            Box::make('margin', 'Margins', 'margin', "Show margins on orders", 'pricing', true),
            Box::make('customer_account', 'Customer Account', 'customer_account', "Let your customers log in to see their documents", 'pricing', false),
            Box::make('pricelists', 'Pricelists', 'has_pricelist', "Set multiple prices per product, automated discounts, etc.", 'pricing', true, "https://koverae.com/docs/"),
            // Quotation
            Box::make('online-signature', 'Online Signature', 'has_online_signature', "Request customers to sign quotations to validate orders. The default can be changed per order or template.", 'quotation', true, "https://koverae.com/docs/"),
            Box::make('online-payment', 'Online Payment', 'has_online_payment', "Request a payment to confirm orders, in full (100%) or partial. The default can be changed per order or template.", 'quotation', true, "https://koverae.com/docs/"),
            Box::make('sale_warnings', 'Sale Warnings', 'sale_warnings', "Get warnings in orders for products or customers", 'quotation', true),
            Box::make('lock_confirmed_sales', 'Lock Confirmed Sales', 'lock_confirmed_sales', "No longer edit orders once confirmed", 'quotation', true),
            Box::make('has_pro_format_invoice', 'Pro-Forma Invoice', 'has_pro_format_invoice', "Allows you to send Pro-Forma Invoice to your customers", 'quotation', true),
            // Delivery
            Box::make('has_shipping_cost', 'Delivery Methods', 'has_shipping_cost', "Compute shipping costs on orders", 'delivery', true),
            // Invoicing
            Box::make('invoicing-policy', 'Invoicing Policy', 'invoice_policy', "Quantities to invoice from sales orders", 'invoicing', false),
            Box::make('automatic-invoice', 'Automatic Invoice', 'has_automatic_invoice', "Generate the invoice automatically when the online payment is confirmed", 'invoicing', false),
            // Box::make('down_payment', 'Accomptes', 'down_payment', "Produit utilisé pour les acomptes", 'invoicing', false)->component('blocks.boxes.input.simple'),
            // Add more buttons as needed
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('customer-account',null, 'radio', 'customer_account', 'customer_account', '', false, $this->customerAccountOptions)->component('blocks.boxes.input.radio'),
            BoxInput::make('invoicing-policy',null, 'radio', 'invoice_policy', 'invoicing-policy', '', false, $this->invoicingPolicyOptions)->component('blocks.boxes.input.radio'),
        ];
    }

    public function actions() : array
    {
        return [
            BoxAction::make('attributes', 'variant', __('Attributes'), 'link', 'bi-arrow-right'),
            BoxAction::make('uom', 'uom', __('Units of Measure'), 'link', 'bi-arrow-right'),
            BoxAction::make('pricelists', 'pricelists', __('Pricelists'), 'link', 'bi-arrow-right'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_variant' => $this->variant,
            'has_uom' => $this->uom,
            'has_packaging' => $this->package,
            'send_mail_after_confirmation' => $this->email_delivery,
            'has_discount' => $this->discount,
            'has_sale_program' => $this->sale_program,
            'has_margin' => $this->margin,
            'has_customer_account' => $this->customer_account,
            'has_pricelist_check' => $this->has_pricelist,
            'pricelist' => $this->pricelist,
            'has_sale_warnings' =>$this->sale_warnings,
            'lock_confirmed_sales' => $this->lock_confirmed_sales,
            'has_pro_format_invoice' => $this->has_pro_format_invoice,
            'has_shipping_cost' => $this->has_shipping_cost,
            // 'invoice_policy' => $this->invoice_policy,
            'down_payment' => $this->down_payment,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes saved successfully');
    }
}
