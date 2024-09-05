<?php

namespace Modules\Invoicing\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Component;

class InvoicingSetting extends AppSetting
{
    public $setting;
    public $fiscal_localization_package='kenya', $fiscal_country = 'kenya', $rounding_method, $default_currency = 'kenyan_shilling', $currency_converter = 'xe.com', $currency_conversion_interval = 'manually', $currency_conversion_next_run, $default_term_note, $digitize_vendor_bills = 'digitize_automatically', $digitize_customer_invoices = 'digitize_on_demand';

    public array $localizations = [], $roundingOptions = [], $fiscalCountriesOptions = [], $currenciesOptions = [], $converterIntervalsOptions = [], $currenciesConverterProvidersOptions = [], $digitizationOptions = [];

    public bool $has_automatic_currency_rate = false, $has_taxes_in_company_currency = true, $has_default_terms = false, $has_invoice_amount_in_letter = false, $has_invoice_authorized_signer = false, $has_default_credit_limit = false, $has_customer_address = false, $has_invoice_online_payment = true, $has_invoice_qr_code = false, $has_batch_payments = false, $has_purchase_receipt = false, $has_digitize_document = true;

    public function mount($setting){

        $this->setting = $setting;
        $localizations = [
            ['id' => 'generic_chart', 'label' => 'Generic Chart Template'],
            ['id' => 'kenya', 'label' => 'ᴋᴇ Kenya'],
            ['id' => 'uganda', 'label' => 'ᴜɢ Uganda'],
            ['id' => 'ethiopia', 'label' => 'ᴇᴛʜ Ethiopia'],
            ['id' => 'rwanda', 'label' => 'ʀᴡ Rwanda'],
        ];
        $this->localizations = toSelectOptions($localizations, 'id', 'label');
        $roundingOptions = [
            ['id' => 'round_per_line', 'label' => 'Round Per Line'],
            ['id' => 'round_globally', 'label' => 'Round Globally'],
        ];
        $this->roundingOptions = toSelectOptions($roundingOptions, 'id', 'label');
        $countries = [
            ['id' => 'uganda', 'label' => 'ᴜɢ Uganda'],
            ['id' => 'kenya', 'label' => 'ᴋᴇ Kenya'],
            ['id' => 'ethiopia', 'label' => 'ᴇᴛʜ Ethiopia'],
            ['id' => 'rwanda', 'label' => 'ʀᴡ Rwanda'],
            ['id' => 'tanzania', 'label' => 'ᴛᴀɴ Tanzania'],
            ['id' => 'south_africa', 'label' => 'sᴀ South Africa'],
            ['id' => 'nigeria', 'label' => 'ɴɢ Nigeria'],
            ['id' => 'egypt', 'label' => 'ᴇɢʏ Egypt'],
            ['id' => 'ghana', 'label' => 'ɢʜ Ghana'],
            ['id' => 'morocco', 'label' => 'ᴍᴀʀ Morocco'],
            ['id' => 'algeria', 'label' => 'ᴀʟɢ Algeria'],
            ['id' => 'libya', 'label' => 'ʟʏ Libya'],
            ['id' => 'angola', 'label' => 'ᴀɴɢ Angola'],
            ['id' => 'mozambique', 'label' => 'ᴍᴏᴢ Mozambique'],
            ['id' => 'namibia', 'label' => 'ɴᴀᴍ Namibia'],
            ['id' => 'zambia', 'label' => 'ᴢᴀᴍ Zambia'],
            ['id' => 'zimbabwe', 'label' => 'ᴢɪᴍ Zimbabwe'],
            ['id' => 'botswana', 'label' => 'ʙᴡᴛ Botswana'],
            ['id' => 'malawi', 'label' => 'ᴍᴡɪ Malawi'],
            ['id' => 'senegal', 'label' => 'sᴇɴ Senegal'],
            ['id' => 'mali', 'label' => 'ᴍʟɪ Mali'],
            ['id' => 'burkina_faso', 'label' => 'ʙғᴀ Burkina Faso'],
            ['id' => 'niger', 'label' => 'ɴᴇʀ Niger'],
            ['id' => 'mauritius', 'label' => 'ᴍᴜs Mauritius'],
            ['id' => 'seychelles', 'label' => 'sʏᴄ Seychelles'],
            ['id' => 'sudan', 'label' => 'sᴜᴅ Sudan'],
            ['id' => 'eritrea', 'label' => 'ᴇʀᴇ Eritrea'],
            ['id' => 'somalia', 'label' => 'sᴏᴍ Somalia'],
            ['id' => 'djibouti', 'label' => 'ᴅᴊɪ Djibouti'],
            ['id' => 'comoros', 'label' => 'ᴄᴏᴍ Comoros'],
            ['id' => 'equatorial_guinea', 'label' => 'ᴇɢɴ Equatorial Guinea'],
            ['id' => 'gabon', 'label' => 'ɢᴀʙ Gabon'],
            ['id' => 'congo_brazzaville', 'label' => 'ᴄɢᴏ Congo-Brazzaville'],
            ['id' => 'congo_kinshasa', 'label' => 'ᴄᴏᴅ Congo-Kinshasa'],
            ['id' => 'central_african_republic', 'label' => 'ᴄᴀʀ Central African Republic'],
            ['id' => 'cameroon', 'label' => 'ᴄᴍʀ Cameroon'],
            ['id' => 'ivory_coast', 'label' => 'ᴄɪᴠ Ivory Coast'],
            ['id' => 'sierra_leone', 'label' => 'sʟᴇ Sierra Leone'],
            ['id' => 'liberia', 'label' => 'ʟɪʙ Liberia'],
            ['id' => 'benin', 'label' => 'ʙᴇɴ Benin'],
            ['id' => 'togo', 'label' => 'ᴛɢᴏ Togo'],
            ['id' => 'burundi', 'label' => 'ʙᴜʀ Burundi'],
            ['id' => 'lesotho', 'label' => 'ʟsᴏ Lesotho'],
            ['id' => 'cape_verde', 'label' => 'ᴄᴠᴇ Cape Verde'],
            ['id' => 'swaziland', 'label' => 'sᴡᴢ Eswatini'],
            ['id' => 'gambia', 'label' => 'ɢᴍʙ Gambia'],
            ['id' => 'guinea', 'label' => 'ɢɪɴ Guinea'],
            ['id' => 'guinea_bissau', 'label' => 'ɢɴʙ Guinea-Bissau'],
            ['id' => 'madagascar', 'label' => 'ᴍᴅɢ Madagascar'],
            ['id' => 'mauritania', 'label' => 'ᴍʀᴛ Mauritania'],
            ['id' => 'sao_tome_principe', 'label' => 'sᴛᴘ Sao Tome & Principe']
        ];
        $this->fiscalCountriesOptions = toSelectOptions($countries, 'id', 'label');

        $currencies = [
            ['id' => 'kenyan_shilling', 'label' => 'KES'],
            ['id' => 'nigerian_naira', 'label' => 'NGN'],
            ['id' => 'south_african_rand', 'label' => 'ZAR'],
            ['id' => 'egyptian_pound', 'label' => 'EGP'],
            ['id' => 'ghanaian_cedi', 'label' => 'GHS'],
            ['id' => 'moroccan_dirham', 'label' => 'MAD'],
            ['id' => 'tunisian_dinar', 'label' => 'TND'],
            ['id' => 'ugandan_shilling', 'label' => 'UGX'],
            ['id' => 'ethiopian_birr', 'label' => 'ETB'],
            ['id' => 'tanzanian_shilling', 'label' => 'TZS'],
            ['id' => 'rwandan_franc', 'label' => 'RWF'],
            ['id' => 'zambian_kwacha', 'label' => 'ZMW'],
            ['id' => 'algerian_dinar', 'label' => 'DZD'],
            ['id' => 'libyan_dinar', 'label' => 'LYD'],
            ['id' => 'angolan_kwanza', 'label' => 'AOA'],
            ['id' => 'mozambican_metical', 'label' => 'MZN'],
            ['id' => 'namibian_dollar', 'label' => 'NAD'],
            ['id' => 'botswana_pula', 'label' => 'BWP'],
            ['id' => 'malawian_kwacha', 'label' => 'MWK'],
            ['id' => 'mauritian_rupee', 'label' => 'MUR'],
            ['id' => 'seychellois_rupee', 'label' => 'SCR'],
            ['id' => 'sudanese_pound', 'label' => 'SDG'],
            ['id' => 'somali_shilling', 'label' => 'SOS'],
            ['id' => 'sierra_leonean_leone', 'label' => 'SLL'],
            ['id' => 'cape_verdean_escudo', 'label' => 'CVE'],
            ['id' => 'eritrean_nakfa', 'label' => 'ERN'],
            ['id' => 'djiboutian_franc', 'label' => 'DJF'],
            ['id' => 'comorian_franc', 'label' => 'KMF'],
            ['id' => 'equatorial_guinea_cfa_franc', 'label' => 'XAF'],
            ['id' => 'gabonese_cfa_franc', 'label' => 'XAF'],
            ['id' => 'congolese_franc', 'label' => 'CDF'],
            ['id' => 'burundian_franc', 'label' => 'BIF'],
            ['id' => 'lesotho_loti', 'label' => 'LSL'],
            ['id' => 'swazi_lilangeni', 'label' => 'SZL'],
            ['id' => 'gambian_dalasi', 'label' => 'GMD'],
            ['id' => 'guinean_franc', 'label' => 'GNF'],
            ['id' => 'liberian_dollar', 'label' => 'LRD'],
            ['id' => 'central_african_cfa_franc', 'label' => 'XAF']
        ];
        $this->currenciesOptions = toSelectOptions($currencies, 'id', 'label');
        $intervals = [
            ['id' => 'manually', 'label' => __('Manually')],
            ['id' => 'daily', 'label' => __('Daily')],
            ['id' => 'weekly', 'label' => __('Weekly')],
            ['id' => 'monthly', 'label' => __('Monthly')],
        ];
        $this->converterIntervalsOptions = toSelectOptions($intervals, 'id', 'label');

        $providers = [
            ['id' => 'xe.com', 'label' => 'xe.com'],
            ['id' => 'eu_central_bank', 'label' => __('European Central Bank')],
        ];
        $this->currenciesConverterProvidersOptions = toSelectOptions($providers, 'id', 'label');

        $digitizations = [
            ['id' => 'not_digitize', 'label' => __('Do not digitize')],
            ['id' => 'digitize_on_demand', 'label' => __('Digitize on demand')],
            ['id' => 'digitize_automatically', 'label' => __('Digitize automatically')],
        ];
        $this->digitizationOptions = toSelectOptions($digitizations, 'id', 'label');
    }

    public function blocks() : array
    {
        return [
            Block::make('fiscal-localization', __('Local Tax Adaptation')),
            Block::make('taxes', __('Taxes')),
            Block::make('currencies', __('Currencies')),
            Block::make('customer-invoice', __('Customer Invoices')),
            Block::make('customer-payment', __('Customer Payments')),
            Block::make('vendor-bills', __('Vendor Bills')),
            Block::make('digitization', __('Digitization')),
            // Block::make('vendor-payment', __('Vendor Payments')),
            // Block::make('kenya-etims', __('Kenya eTIMS Integration')),
            // Block::make('taxes', __('Taxes')),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            Box::make('fiscal-localization', 'Fiscal Localization', 'fiscal_localization', "Taxes, fiscal positions, chart of accounts & legal statements for your country", 'fiscal-localization', false, "https://www.koverae.com/docs", null),
            Box::make('default-taxes', 'Default Taxes', 'default_taxes', "Default taxes applied to local transactions", 'taxes', false, "https://www.koverae.com/docs", null),
            Box::make('rounding-method', 'Rounding Method', 'default_taxes', "How total tax amount is computed in orders and invoices", 'taxes', false, null, null),
            Box::make('fiscal-country', 'Fiscal Country', 'fiscal_country', "Domestic country of your accounting", 'taxes', false, null, null),
            Box::make('eu-market', __('EU Internal Market Remote Sales'), 'eu_market', "Apply VAT of the EU country to which goods and services are delivered.", 'taxes', true, null, null),
            Box::make('main-currency', __('Main Currency'), 'defualt_currency', "Main currency of your company", 'currencies', false, "https://wwww.koverae.com/docs", null),
            Box::make('auto-rate', __('Automatic Currency Rates'), 'has_automatic_currency_rate', "Update exchange rates automatically", 'currencies', true, "https://wwww.koverae.com/docs", null),
            Box::make('customer-addresses', __('Customer Addresses'), 'has_customer_address', "Select specific invoice and delivery addresses", 'customer-invoice', true, "", null),
            Box::make('taxes-in-company-currency', __('Taxes in company currency'), 'has_taxes_in_company_currency', __("Taxes are also displayed in local currency on invoices"), 'customer-invoice', true, "", null),
            Box::make('invoice-warning', __('Warning'), 'has_customer_invoice_warnings', "Get warnings when invoicing specific customers", 'customer-invoice', true, "", null),
            Box::make('written-invoice', __('Written total of the invoice'), 'has_invoice_amount_in_letter', "Display the total amount of an invoice in letters", 'customer-invoice', true, "", null),
            Box::make('authorized-signer', __('Authorized invoice signer'), 'has_invoice_authorized_signer', "To enhance authenticity, add a signature to your invoices", 'customer-invoice', true, "", null),
            Box::make('sales-credits', __('Sales Credit Limit'), 'has_default_credit_limit', "Trigger alerts when creating Invoices and Sales Orders for Partners with a Total Receivable amount exceeding a limit.", 'customer-invoice', true, "", null),
            Box::make('online-payment', __('Digital Payment for Invoice'), 'has_invoice_online_payment', "Let your customers pay their invoices online", 'customer-payment', true, "", null),
            Box::make('batch-payment', __('Batch Payments'), 'has_batch_payments', "Group payments into a single batch to ease the reconciliation process", 'customer-payment', true, "", null),
            Box::make('qr-code', __('Qr Codes'), 'has_invoice_qr_code', "Add a payment QR-code to your invoices", 'customer-payment', true, "", null),
            Box::make('purchase-receipt', __('Purchase Receipt'), 'has_purchase_receipt', "Activate to create purchase receipt", 'vendor-bills', true, "", null),
            // Box::make('forecast-vendor-product', __('Estimate products on vendor bill'), 'has_default_terms', "Add your terms & conditions at the bottom of invoices/orders/quotations", 'vendor-bills', true, "", null),
            Box::make('document-digitization', __('Document Digitization'), 'has_digitize_document', "Digitize your PDF or scanned documents with Artificial Intelligence and OCR", 'digitization', true, "", null),
            Box::make('vendor-bills', __('Vendor Bills'), 'digitize_vendor_bills', null, 'digitization', false, "", null),
            Box::make('customer-invoices', __('Customer Invoices'), 'digitize_customer_invoices', null, 'digitization', false, "", null),
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('fiscal-localization-package', __('Package'), 'select', 'fiscal_localization_package', 'fiscal-localization', '', false, $this->localizations),
            BoxInput::make('sales-tax', __('Sales Tax'), 'select', 'sales_tax', 'default-taxes', '', false, $this->localizations),
            BoxInput::make('purchase-tax', __('Purchase Tax'), 'select', 'purchase_tax', 'default-taxes', '', false, $this->localizations),
            BoxInput::make('rounding-method', null, 'select', 'rounding_method', 'rounding-method', '', false, $this->roundingOptions),
            BoxInput::make('fiscal-country', null, 'select', 'fiscal_country', 'fiscal-country', '', false, $this->fiscalCountriesOptions),
            BoxInput::make('main-currency', null, 'select', 'default_currency', 'main-currency', '', false, $this->currenciesOptions),
            BoxInput::make('curreny-converter', __('Provider'), 'select', 'currency_converter', 'auto-rate', '', false, $this->currenciesConverterProvidersOptions),
            BoxInput::make('main-currency', __('Interval'), 'select', 'currency_conversion_interval', 'auto-rate', '', false, $this->converterIntervalsOptions),
            BoxInput::make('main-currency', __('Next Run'), 'date', 'currency_conversion_next_run', 'auto-rate', '', false),
            BoxInput::make('default-terms', __('Default Terms & Conditions'), 'textarea', 'default_term_note', 'default-term', '', false)->component('inputs.textarea.simple'),
            BoxInput::make('default-sales-credit', __('Default Credit Limit'), 'text', 'default_credit_limit', 'sales-credits', '', false)->component('blocks.boxes.input.input-currency'),
            BoxInput::make('vendor-bills', null, 'select', 'digitize_vendor_bills', 'vendor-bills', '', false, $this->digitizationOptions),
            BoxInput::make('customer-invoices', null, 'select', 'digitize_customer_invoices', 'customer-invoices', '', false, $this->digitizationOptions),
        ];
    }

    public function actions() : array
    {
        return [
            BoxAction::make('main-currency', 'main-currency', __('Currencies'), 'link', 'bi-arrow-right'),
        ];
    }
}
