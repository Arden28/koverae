<?php

namespace Modules\Pos\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Settings\Entities\Setting;

class PosSetting extends AppSetting
{
    public $setting, $pos;
    public $shops;
    public bool $is_restaurant_bar, $has_automatically_validate_order, $has_maximum_difference_at_closing, $has_product_specific_closing_entry, $has_tips, $has_stripe_payment_terminal, $has_paytm_payment_terminal, $has_start_category, $has_restricted_categories, $has_large_scrollbar, $has_share_orders, $show_category_images, $show_product_images, $has_margin_cost, $has_flexible_taxes, $has_price_control, $has_line_discounts, $has_sales_program, $has_pricer, $has_customer_header_footer, $has_automatic_receipt_printer, $has_qr_code_on_ticket, $has_unique_code_on_ticket, $has_preparation_display, $has_allow_ship_later;
    public $default_sales_tax, $defaulft_order_journal, $defaulft_invoice_journal, $maximum_difference_at_closing;
    public array $taxesOptions = [], $orderJournalOptions = [], $invoiceJournalOptions = [], $paymentMethodOptions = [];

    public function mount($setting, $pos = null){

        $this->setting = $setting;
        $this->shops = Pos::isCompany($this->setting->company_id)->get();
        $this->pos = $this->shops->first();
        $this->is_restaurant_bar = $this->pos->setting->is_restaurant_bar;
        $this->has_flexible_taxes = $this->pos->setting->has_flexible_taxes;
        $this->defaulft_order_journal = $this->pos->setting->defaulft_order_journal_id;
        $this->defaulft_invoice_journal = $this->pos->setting->defaulft_invoice_journal_id;
        $this->has_product_specific_closing_entry = $this->pos->setting->has_product_specific_closing_entry;
        $this->has_automatically_validate_order = $this->pos->setting->has_automatically_validate_order;
        $this->has_maximum_difference_at_closing = $this->pos->setting->has_maximum_difference_at_closing;
        $this->maximum_difference_at_closing = $this->pos->setting->maximum_difference_at_closing;
        $this->has_tips = $this->pos->setting->has_tips;
        $this->has_stripe_payment_terminal = $this->pos->setting->has_stripe_payment_terminal;
        $this->has_paytm_payment_terminal = $this->pos->setting->has_paytm_payment_terminal;
        $this->has_share_orders = $this->pos->setting->has_share_orders;
        $this->has_large_scrollbar = $this->pos->setting->has_large_scrollbar;
        $this->show_category_images = $this->pos->setting->show_category_images;
        $this->show_product_images = $this->pos->setting->show_product_images;
        
        
        $taxes = [
            ['id' => 1, 'label' => __('16%')],
            ['id' => 2, 'label' => __('8%')],
        ];
        $this->taxesOptions = toSelectOptions($taxes, 'id', 'label');
        $journals = [
            ['id' => 1, 'label' => __('Point Of Sales')],
            ['id' => 2, 'label' => __('Customer Invoices')],
        ];
        $this->orderJournalOptions = toSelectOptions($journals, 'id', 'label');
        $this->invoiceJournalOptions = toSelectOptions($journals, 'id', 'label');
    
        $payments = [
            ['id' => 1, 'label' => __('Customer Account')],
            ['id' => 2, 'label' => __('Cash')],
            ['id' => 3, 'label' => __('Card')],
        ];
        $this->paymentMethodOptions = toSelectOptions($payments, 'id', 'label');
    
    }
    

    public function blocks() : array
    {
        return [
            Block::make('pos', __('Point Of Sales'))->component('blocks.templates.pos-header'),
            Block::make('restaurant-mode', __('Bar / Restaurant Mode')),
            Block::make('accounting', __('Accounting')),
            Block::make('payment', __('Payment')),
            Block::make('payment-terminal', __('Payment Terminal')),
            Block::make('pos-interface', __('Interface')),
            Block::make('product-categories', __('Pos Categories & Products')),
            Block::make('sales', __('Sales')),
            Block::make('pricing', __('Pricing')),
            Block::make('bill-receipt', __('Receipts & Bills')),
            Block::make('connected-devices', __('Connected Devices')),
            Block::make('preparation', __('Preparation')),
            Block::make('inventory', __('Inventory')),
            // Add more buttons as needed
        ];
    }

    public function boxes() :array
    {
        return [
            Box::make('is-restaurant', __('Is a bar / restaurant'), 'is_restaurant_bar', null, 'restaurant-mode', true),
            // Accounting
            Box::make('sales-taxes', __('Default Sales Tax'), 'default_sales_tax', "Default sales tax for products", 'accounting', false),
            Box::make('default-journal', __('Default Journals'), '', "Default journals for orders and invoices", 'accounting', false),
            Box::make('flexible-taxes', __('Flexible Taxes'), 'has_flexible_taxes', "Apply fiscal positions to assign varying taxes per order.", 'accounting', true),
            Box::make('closing-entry', __('Product-Specific Closing Entry'), 'is_restaurant_bar', __("Show the detailed sales line items by product in the auto-generated closing entry"), 'accounting', true),
            // Payment
            Box::make('payment-method', __('Payment Methods'), '', __('Available payment options'), 'payment', false, 'https://www.koverae.com/docs'),
            Box::make('auto-confirm', __('Automatically confirm order'), 'has_automatically_validate_order', __('Automatically confirms orders processed through a payment terminal.'), 'payment', true),
            Box::make('cash-rounding', __('Cash Rounding'), 'is_restaurant_bar', __('Specify the smallest denomination of the currency for cash payments.'), 'payment', true, 'https://www.koverae.com/docs'),
            Box::make('max-difference', __('Establish Maximum Difference'), 'has_maximum_difference_at_closing', __('Define the maximum permissible discrepancy between projected and actual cash during session closure.'), 'payment', true),
            Box::make('tips', __('Tips'), 'has_tips', __('Allow customers to leave tips or convert their change into gratuities.'), 'payment', true),
            // Payment Terminal
            Box::make('stripe-payment', __('Stripe'), 'has_stripe_payment_terminal', __('Process payments using a Stripe payment terminal.'), 'payment-terminal', true),
            Box::make('paytm-payment', __('PayTM'), 'has_paytm_payment_terminal', __('Process payments using a PayTM payment terminal.'), 'restaurant-mode', true),
            // Pos Interface
            Box::make('large-scrollbar', __('Oversized Scrollbars'), 'has_large_scrollbar', __('Enhance navigation on industrial touchscreens with low precision.'), 'pos-interface', true),
            Box::make('share-orders', __('Share Active Orders'), 'has_share_orders', __('Allow to access to each other’s ongoing orders.'), 'pos-interface', true),
            Box::make('hide-pictures', __('Hide pictures in POS'), '', __('Self-ordering systems remain unaffected.'), 'pos-interface', false),
            Box::make('share-orders', __('Share Active Orders'), 'has_share_orders', __('Allow to access to each other’s ongoing orders.'), 'pos-interface', true),
            Box::make('share-orders', __('Share Active Orders'), 'has_share_orders', __('Allow to access to each other’s ongoing orders.'), 'pos-interface', true),
            Box::make('share-orders', __('Share Active Orders'), 'has_share_orders', __('Allow to access to each other’s ongoing orders.'), 'pos-interface', true),
        
        ];
    }
    
    public function inputs() : array
    {
        return [
            BoxInput::make('sales-taxes',null, 'select', 'default_sales_tax', 'sales-taxes', '', false, $this->taxesOptions),
            BoxInput::make('invoice-journal',__('Invoices'), 'select', 'defaulft_invoice_journal', 'default-journal', '', false, $this->invoiceJournalOptions),
            BoxInput::make('order-journal',__('Orders'), 'select', 'defaulft_order_journal', 'default-journal', '', false, $this->orderJournalOptions),
            BoxInput::make('payment-methods',null, 'select', 'defaulft_order_journal', 'payment-method', '', false, ['data' => $this->paymentMethodOptions])->component('blocks.boxes.input.tag.select-tag-input'),
            BoxInput::make('authorized-difference',__('Authorized Difference'), 'text', 'maximum_difference_at_closing', 'max-difference', '0.00', false, ['parent' => $this->has_maximum_difference_at_closing])->component('blocks.boxes.input.depends'),
            BoxInput::make('google-client',__('Pause the syncronization'), 'checkbox', 'google_calendar_pause_sync', 'google-calendar', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('show-category',__('Show categories images'), 'checkbox', 'show_category_images', 'hide-pictures', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('show-product',__('Show products images'), 'checkbox', 'show_product_images', 'hide-pictures', '', false)->component('blocks.boxes.input.checkbox'),
        ];
    }
    
    public function actions() : array
    {
        return [
            BoxAction::make('taxes', 'sales-taxes', __('Taxes'), 'link', 'bi-arrow-right', "",  ['parent' => $this->is_restaurant_bar]),
            BoxAction::make('fiscal-position', 'flexible-taxes', __('Fiscal Positions'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_flexible_taxes])->component('blocks.boxes.action.depends'),
        ];
    }

}
