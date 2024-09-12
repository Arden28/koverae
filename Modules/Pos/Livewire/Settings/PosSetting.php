<?php

namespace Modules\Pos\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Inventory\Entities\Category;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Sales\Entities\SalesTeam;
use Modules\Settings\Entities\Setting;

class PosSetting extends AppSetting
{
    public $setting, $pos;
    public $shops;
    public bool $is_restaurant_bar, $has_automatically_validate_order, $has_maximum_difference_at_closing, $has_product_specific_closing_entry, $has_tips, $has_stripe_payment_terminal, $has_paytm_payment_terminal, $has_start_category, $has_restricted_categories, $has_large_scrollbar, $has_share_orders, $show_category_images, $show_product_images, $has_margin_cost, $has_flexible_taxes, $has_price_control, $has_line_discounts, $has_sales_program, $has_pricer, $has_customer_header_footer, $has_automatic_receipt_printer, $has_self_service_invoicing, $has_qr_code_on_ticket, $has_unique_code_on_ticket, $has_preparation_display, $has_allow_ship_later;
    public $default_sales_tax, $defaulft_order_journal, $defaulft_invoice_journal, $maximum_difference_at_closing, $restricted_categories, $start_category, $sales_team, $down_payment_product, $product_prices, $custom_header, $custom_footer, $self_invoicing_print, $internal_notes, $barcode_nomenclature, $warehouse, $shipping_policy, $operation_type;
    public array $taxesOptions = [], $orderJournalOptions = [], $invoiceJournalOptions = [], $paymentMethodOptions = [], $productCategoriesOptions, $salesTeamsOptions = [], $productOptions = [], $productPricesOptions = [], $seflInvoicingOptions = [], $noteModels = [], $nomenclatures = [], $operationTypes = [];

    public function mount($setting, $pos = null){

        $this->setting = $setting;
        $this->shops = Pos::isCompany($this->setting->company_id)->get();
        $pos = $this->shops->first();
        $this->pos = $pos;
        $this->is_restaurant_bar = $pos->setting->is_restaurant_bar;
        $this->has_flexible_taxes = $pos->setting->has_flexible_taxes;
        $this->defaulft_order_journal = $pos->setting->defaulft_order_journal_id;
        $this->defaulft_invoice_journal = $pos->setting->defaulft_invoice_journal_id;
        $this->has_product_specific_closing_entry = $pos->setting->has_product_specific_closing_entry;
        $this->has_automatically_validate_order = $pos->setting->has_automatically_validate_order;
        $this->has_maximum_difference_at_closing = $pos->setting->has_maximum_difference_at_closing;
        $this->maximum_difference_at_closing = $pos->setting->maximum_difference_at_closing;
        $this->has_tips = $pos->setting->has_tips;
        $this->has_stripe_payment_terminal = $pos->setting->has_stripe_payment_terminal;
        $this->has_paytm_payment_terminal = $pos->setting->has_paytm_payment_terminal;
        $this->has_share_orders = $pos->setting->has_share_orders;
        $this->has_large_scrollbar = $pos->setting->has_large_scrollbar;
        $this->show_category_images = $pos->setting->show_category_images;
        $this->show_product_images = $pos->setting->show_product_images;
        $this->has_restricted_categories = $pos->setting->has_restricted_categories;
        $this->restricted_categories = $pos->setting->restricted_categories;
        $this->has_start_category = $pos->setting->has_start_category;
        $this->start_category = $pos->setting->start_category_id;
        $this->has_margin_cost = $pos->setting->has_margin_cost;
        $this->sales_team = $pos->setting->sales_team_id;
        $this->down_payment_product = $pos->setting->down_payment_product_id;
        $this->has_price_control = $pos->setting->has_price_control;
        $this->has_line_discounts = $pos->setting->has_line_discounts;
        $this->has_pricer = $pos->setting->has_pricer;
        $this->has_sales_program = $pos->setting->has_sales_program;
        $this->product_prices = $pos->setting->product_prices;
        $this->has_customer_header_footer = $pos->setting->has_customer_header_footer;
        $this->custom_header = $pos->setting->custom_header;
        $this->custom_footer = $pos->setting->custom_footer;
        $this->has_automatic_receipt_printer = $pos->setting->has_automatic_receipt_printer;
        $this->has_self_service_invoicing = $pos->setting->has_self_service_invoicing;
        $this->has_preparation_display = $pos->setting->has_preparation_display;
        $this->internal_notes = $pos->setting->internal_notes;
        $this->barcode_nomenclature = $pos->setting->barcode_nomenclature_id;
        $this->has_allow_ship_later = $pos->setting->has_allow_ship_later;
        $this->warehouse = $pos->setting->warehouse_id;
        $this->shipping_policy = $pos->setting->shipping_policy;
        $this->operation_type = $pos->setting->operation_type_id;

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
        
        $productCategories = Category::isCompany(current_company()->id)->get();
        $this->productCategoriesOptions = toSelectOptions($productCategories, 'id', 'category_name');

        $salesTeams = SalesTeam::isCompany(current_company()->id)->get();
        $this->salesTeamsOptions = toSelectOptions($salesTeams, 'id', 'name');

        $products = Product::isCompany(current_company()->id)->get();
        $this->productOptions = toSelectOptions($products, 'id', 'product_name');
        
        $productPrices = [
            ['id' => 'tax-excluded', 'label' => __('Tax Excluded')],
            ['id' => 'tax-included', 'label' => __('Tax Included')],
        ];
        $this->productPricesOptions = toRadioOptions($productPrices, 'id', 'label', 'free_signup');
    
        $printOptions = [
            ['id' => 'qr-code', 'label' => __('Qr Code')],
            ['id' => 'url', 'label' => __('URL')],
            ['id' => 'qr-code-url', 'label' => __('Qr Code + URL')],
        ];
        $this->seflInvoicingOptions = toSelectOptions($printOptions, 'id', 'label');
        
        $this->noteModels = toSelectOptions($this->internal_notes, 'id', 'label');
        
        $nomenclatureOptions = [
            ['id' => 1, 'label' => __('Default Nomenclature')],
        ];
        $this->nomenclatures = toSelectOptions($nomenclatureOptions, 'id', 'label');

        $operationTypes = OperationType::isCompany(current_company()->id)->get();
        $this->operationTypes = toSelectOptions($operationTypes, 'id', 'name');
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
            // Block::make('connected-devices', __('Connected Devices')),
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
            // Product Categories & Products
            Box::make('restrict-categories', __('Restrict Categories'), 'has_restricted_categories', __('Choose which product PoS categories are available'), 'product-categories', true),
            Box::make('start-category', __('Start Category'), 'has_start_category', __('Start selling from a default product PoS category'), 'product-categories', true),
            Box::make('show-margin', __('Show costs & margins'), 'has_margin_cost', __('Show margins & costs on product information'), 'product-categories', true),
            // Sales
            Box::make('sales-team', __('Sales Team'), '', __('Sales are reported to the following sales team'), 'sales', false),
            Box::make('down-payment', __('Down Payment Product'), '', __('This product will be applied when down payment is made'), 'sales', false),
            // Pricing
            Box::make('price-control', __('Price Control'), 'has_price_control', __('Limit price changes to managers only.'), 'pricing', true),
            Box::make('line-discount', __('Discounts Per Item'), 'has_line_discounts', __('Permit cashiers to apply discounts to individual items.'), 'pricing', true),
            Box::make('pricer', __('Price Setter'), 'has_pricer', __('Show and refresh your product details using digital price labels'), 'pricing', true, 'https://www.koverae.com/docs'),
            // Box::make('global-discount', __('Global Discounts'), 'has_share_orders', __('Allow to access to each other’s ongoing orders.'), 'pricing', true),
            Box::make('sales-programs', __('Special Offers, Vouchers, Gift Cards & Rewards Program'), 'has_sales_program', __('Manage promotions that provide customers with discounts or gifts'), 'pricing', true),
            Box::make('product-prices', __('Product Prices'), 'product_prices', __('Product prices on receipts'), 'pricing', false),
            // Bills & Receipts
            Box::make('custom-receipt', __('Personalized Header & Footer'), 'has_customer_header_footer', __('Insert a personalized message in the header and footer'), 'bill-receipt', true),
            Box::make('automatic-printing', __('Automatic Receipt Printing'), 'has_automatic_receipt_printer', __('Automatically generate receipts upon payment confirmation'), 'bill-receipt', true),
            Box::make('self-invoicing', __('Self-service invoicing'), 'has_self_service_invoicing', __('Include details on the receipt that enable customers to request an invoice at any time via the Kover portal'), 'bill-receipt', true),
            // Connected Devices
            Box::make('preparation-display', __('Preparation Display'), 'has_preparation_display', __('Present orders on the preparation monitor'), 'preparation', true),
            Box::make('internal-note', __('Internal Notes'), '', __('Include internal comments on kitchen order lines'), 'preparation', false),
            // Inventory
            Box::make('barcode-nomenclature', __('Barcode'), '', __('Utilize barcodes for scanning products, customer cards, and more'), 'inventory', false),
            Box::make('ship-later', __('Allow Ship Later'), 'has_allow_ship_later', __('Sell products and deliver them later'), 'inventory', true),
            Box::make('operation-type', __('Operation Type'), '', __('Utilized for logging product pick-ups. Products are drawn from their primary source location.'), 'inventory', false),

        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('sales-taxes', null, 'select', 'default_sales_tax', 'sales-taxes', '', false, $this->taxesOptions),
            BoxInput::make('invoice-journal',__('Invoices'), 'select', 'defaulft_invoice_journal', 'default-journal', '', false, $this->invoiceJournalOptions),
            BoxInput::make('order-journal',__('Orders'), 'select', 'defaulft_order_journal', 'default-journal', '', false, $this->orderJournalOptions),
            BoxInput::make('payment-methods',null, 'select', 'defaulft_order_journal', 'payment-method', '', false, ['data' => $this->paymentMethodOptions])->component('blocks.boxes.input.tag.select-tag-input'),
            BoxInput::make('authorized-difference',__('Authorized Difference'), 'text', 'maximum_difference_at_closing', 'max-difference', '0.00', false, ['parent' => $this->has_maximum_difference_at_closing])->component('blocks.boxes.input.depends'),
            // BoxInput::make('google-client',__('Pause the syncronization'), 'checkbox', 'google_calendar_pause_sync', 'google-calendar', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('show-category',__('Show categories images'), 'checkbox', 'show_category_images', 'hide-pictures', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('show-product',__('Show products images'), 'checkbox', 'show_product_images', 'hide-pictures', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('start-category', null, 'select', 'show_product_images', 'start-category', '', true, ['parent' => $this->has_start_category, 'data' => $this->productCategoriesOptions])->component('blocks.boxes.input.depends'),
            BoxInput::make('restricted-category', null, 'select', 'restricted_categories', 'restrict-categories', '', true, ['data' => $this->productCategoriesOptions])->component('blocks.boxes.input.tag.select-tag-input'),
            BoxInput::make('sales-team',null, 'select', 'sales_team', 'sales-team', '', false, $this->salesTeamsOptions),
            BoxInput::make('down-product',null, 'select', 'down_payment_product', 'down-payment', '', false, $this->productOptions),
            BoxInput::make('product-price',null, 'radio', 'product_prices', 'product-prices', '', false, $this->productPricesOptions)->component('blocks.boxes.input.radio'),
            BoxInput::make('custom-header',__('Header'), 'textarea', 'custom_header', 'custom-receipt', 'e.g. Company Website, Address', false, ['parent' => $this->has_customer_header_footer])->component('blocks.boxes.input.depends'),
            BoxInput::make('custom-footer',__('Footer'), 'textarea', 'custom_footer', 'custom-receipt', 'e.g. Return Policy, Thanks for shopping with us 😊! ', false, ['parent' => $this->has_customer_header_footer])->component('blocks.boxes.input.depends'),
            BoxInput::make('self-invoicing-print',__('Print'), 'select', 'self_invoicing_print', 'self-invoicing', '', false, ['parent' => $this->has_self_service_invoicing, 'data' => $this->seflInvoicingOptions])->component('blocks.boxes.input.depends'),
            BoxInput::make('note-models', __('Note Models'), 'select', 'internal_notes', 'internal-note', '', true, ['data' => $this->noteModels])->component('blocks.boxes.input.tag.select-tag-input'),
            BoxInput::make('barcode-nomenclature',__('Barcode Nomenclature'), 'select', 'barcode_nomenclature', 'barcode-nomenclature', '', false, $this->nomenclatures),
            BoxInput::make('operation-types',null, 'select', 'operation_type', 'operation-type', '', false, $this->operationTypes),
        ];
    }

    public function actions() : array
    {
        return [
            BoxAction::make('taxes', 'sales-taxes', __('Taxes'), 'link', 'bi-arrow-right', "",  ['parent' => $this->is_restaurant_bar]),
            BoxAction::make('fiscal-position', 'flexible-taxes', __('Fiscal Positions'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_flexible_taxes])->component('blocks.boxes.action.depends'),
            BoxAction::make('notes', 'internal-note', __('Notes'), 'link', 'bi-arrow-right', ""),
        ];
    }
    
    #[On('save')]
    public function save(){
        $setting = $this->pos->setting;
        $setting->update([
            'is_restaurant_bar' => $this->is_restaurant_bar,
            'has_flexible_taxes' => $this->has_flexible_taxes,
            'defaulft_order_journal_id' => $this->defaulft_order_journal,
            'defaulft_invoice_journal_id' => $this->defaulft_invoice_journal,
            'has_product_specific_closing_entry' => $this->has_product_specific_closing_entry,
            'has_automatically_validate_order' => $this->has_automatically_validate_order,
            'has_maximum_difference_at_closing' => $this->has_maximum_difference_at_closing,
            'maximum_difference_at_closing' => $this->maximum_difference_at_closing,
            'has_tips' => $this->has_tips,
            'has_stripe_payment_terminal' => $this->has_stripe_payment_terminal,
            'has_paytm_payment_terminal' => $this->has_paytm_payment_terminal,
            'has_share_orders' => $this->has_share_orders,
            'has_large_scrollbar' => $this->has_large_scrollbar,
            'show_category_images' => $this->show_category_images,
            'show_product_images' => $this->show_product_images,
            'has_restricted_categories' => $this->has_restricted_categories,
            'restricted_categories' => $this->restricted_categories,
            'has_start_category' => $this->has_start_category,
            'start_category_id' => $this->start_category,
            'has_margin_cost' => $this->has_margin_cost,
            'sales_team_id' => $this->sales_team,
            'down_payment_product_id' => $this->down_payment_product,
            'has_price_control' => $this->has_price_control,
            'has_line_discounts' => $this->has_line_discounts,
            'has_pricer' => $this->has_pricer,
            'has_sales_program' => $this->has_sales_program,
            'product_prices' => $this->product_prices,
            'has_customer_header_footer' => $this->has_customer_header_footer,
            'custom_header' => $this->custom_header,
            'custom_footer' => $this->custom_footer,
            'has_automatic_receipt_printer' => $this->has_automatic_receipt_printer,
            'has_self_service_invoicing' => $this->has_self_service_invoicing,
            'has_preparation_display' => $this->has_preparation_display,
            'internal_notes' => $this->internal_notes,
            'barcode_nomenclature_id' => $this->barcode_nomenclature,
            'has_allow_ship_later' => $this->has_allow_ship_later,
            'warehouse_id' => $this->warehouse,
            'shipping_policy' => $this->shipping_policy,
            'operation_type_id' => $this->operation_type,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes have been saved');
        return redirect()->route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'pos', 'menu' => current_menu()]);
    }

}
