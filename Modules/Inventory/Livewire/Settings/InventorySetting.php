<?php

namespace Modules\Inventory\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class InventorySetting extends AppSetting
{
    public $setting, $company;
    public bool $has_packaging, $has_batch_tranfer, $has_warnings, $has_quality, $has_receipt_report, $has_barcode_scanner, $has_show_qty_to_count, $has_stock_barcode_database, $has_shipping_email_confirmation, $has_shipping_sms_confirmation, $has_shipping_signature, $has_delivery_method, $has_variant, $has_uom, $has_package, $has_serial_number, $has_consignment, $has_landed_cost, $has_storage_locations, $has_storage_categories, $has_multistep_routes;
    public $picking_policy, $annual_inventory_day = 31, $annual_inventory_month = 'december', $policiesOptions, $smsConfirmation, $barcode_nomenclature, $nomenclatures;
    public $pickingPoliciesOptions = [], $smsConfirmationOptions = [], $nomenclatureOptions = [];

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        // $setting = SettingSalesSetting::isCompany(current_company()->id)->first();
        $this->setting = $setting;
        $this->has_package = $setting->has_package;
        $this->has_packaging = $setting->has_packaging;
        $this->has_batch_tranfer = $setting->has_batch_tranfer;
        $this->has_warnings = $setting->has_warnings;
        $this->has_quality = $setting->has_quality;
        $this->has_receipt_report = $setting->has_receipt_report;
        $this->has_barcode_scanner = $setting->has_barcode_scanner;
        $this->has_show_qty_to_count = $setting->has_show_qty_to_count;
        $this->has_stock_barcode_database = $setting->has_stock_barcode_database;
        $this->barcode_nomenclature = $setting->barcode_nomenclature_id;
        $this->has_shipping_email_confirmation = $setting->has_shipping_email_confirmation;
        $this->has_shipping_sms_confirmation = $setting->has_shipping_sms_confirmation;
        $this->has_shipping_signature = $setting->has_shipping_signature;
        $this->has_delivery_method = $setting->has_delivery_method;
        $this->has_variant = $setting->has_variant;
        $this->has_uom = $setting->has_uom;
        $this->has_serial_number = $setting->has_serial_number;
        $this->has_consignment = $setting->has_consignment;
        $this->has_landed_cost = $setting->has_landed_cost;
        $this->has_storage_locations = $setting->has_storage_locations;
        $this->has_storage_categories = $setting->has_storage_categories;
        $this->has_multistep_routes = $setting->has_multistep_routes;
        $this->picking_policy = $setting->picking_policy;
        $this->annual_inventory_day = $setting->annual_inventory_day;
        $this->annual_inventory_month = $setting->annual_inventory_month;
        
        $pickingPoliciesOptions = [
            ['id' => 'as_soon_as_possible', 'label' => __('Ship products as soon as they are available')],
            ['id' => 'after_done', 'label' => __('Ship all products at the same time')],
        ];
        $this->policiesOptions = toSelectOptions($pickingPoliciesOptions, 'id', 'label');
        $smsConfirmationOptions = [
            ['id' => 1, 'label' => __('Delivery: Sent by SMS')],
        ];
        $this->smsConfirmation = toSelectOptions($smsConfirmationOptions, 'id', 'label');
        $nomenclatureOptions = [
            ['id' => 1, 'label' => __('Default Nomenclature')],
        ];
        $this->nomenclatures = toSelectOptions($nomenclatureOptions, 'id', 'label');
    }

    public function blocks() : array
    {
        return [
            Block::make('operation', 'Operations'),
            Block::make('barcode', 'Barcode'),
            Block::make('product', 'Products'),
            Block::make('shipping', 'Shipping'),
            Block::make('traceability', 'Traceability'),
            Block::make('warehouse', 'Warehouses'),
            Block::make('valuation', 'Products Valuation'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // $key, $label, $model, $description, $block, $checkbox, $help
        
            // Catalog
            Box::make('has_package', __('Packages'), 'has_package', __("Put your products into packs (e.g., parcels, cartons) and track them"), 'operation', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_batch_tranfer', __('Batch Transfers'), 'has_batch_tranfer', __("Process batch transfers by worker"), 'operation', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_warnings', __('Warnings'), 'has_warnings', __("Receive informative or blocking warnings on partners"), 'operation', true),
            Box::make('picking-policy', __('Picking Policy'), 'picking_policy', __("When to start shipping"), 'operation', true),
            Box::make('has_quality', __('Quality Control'), 'has_quality', __("Add quality controls to your transfer operations"), 'operation', true),
            Box::make('annual-inventory', __("Annual Inventory Day and Month"), 'has_quality', __("Day and month when annual inventories should take place"), 'operation', false),
            Box::make('has_receipt_report', __('Reception Report'), 'has_receipt_report', __("View and allocate received quantities"), 'operation', true),
            // Barcode
            Box::make('barcode-scanner', __('Barcode Reader'), 'has_barcode_scanner', __("Speed up operations using barcodes"), 'barcode', true),
            Box::make('show-qty', __('Display Countable Quantity'), 'has_show_qty_to_count', __("Permit users to view the projected quantity of a product at a given location."), 'barcode', true),
            Box::make('show-qty', __('Inventory Barcode Repository'), 'has_stock_barcode_database', __("Easily create products by scanning barcodes with barcodelookup.com."), 'barcode', true),
            //Shipping
            Box::make('has_shipping_email_confirmation', __('Email Confirmation'), 'has_shipping_email_confirmation', __("Send an automatic confirmation email when delivery orders are completed"), 'shipping', true),
            Box::make('shipping-sms-confirmation', __('SMS Confirmation'), 'has_shipping_sms_confirmation', __("Send an automatic SMS text message confirmation when delivery orders are completed"), 'shipping', true),
            Box::make('has_shipping_signature', __('Signature'), 'has_shipping_signature', __("Require a signature on the delivery slip"), 'shipping', true),
            // Product
            Box::make('product-variant', __('Variants'), 'has_variant', __("Sell product variants using attributes (size, color, etc.)"), 'product', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('product-uom', __('Units of Measure'), 'has_uom', __("Sell and purchase products in different units of measure"), 'product', true),
            Box::make('product-packaging', __('Product Packaging'), 'has_packaging', __("Manage product packaging (examples: pack of 12 bottles, box of 10 pieces)"), 'product', true),
            //Traceability
            Box::make('product-serial-number', __('Lots and Serial Numbers'), 'has_serial_number', __("Get complete traceability from suppliers to customers"), 'traceability', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('product-consignment', __('Consignment'), 'has_consignment', __("Define the owner of stored products"), 'traceability', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            // Warehouse
            Box::make('locations', __('Storage Locations'), 'has_storage_locations', __("Track the location of products in your warehouse"), 'warehouse', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            // Product Valuation
            Box::make('delivered-costs', __('Delivered Costs'), 'has_landed_cost', __("Incorporate supplementary expenses (transport, customs, etc.) into the product value."), 'valuation', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
        
            // Add more buttons as needed
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('picking-policy',null, 'select', 'picking_policy', 'picking-policy', '', false, $this->policiesOptions),
            BoxInput::make('annual-inventory',null, 'select', 'picking_policy', 'annual-inventory', '', false, ['day' => 'annual_inventory_day', 'month' => 'annual_inventory_month'])->component('blocks.boxes.input.day-month-input'),
            BoxInput::make('sms-confirmation',__('SMS Template'), 'select', 'has_shipping_sms_confirmation', 'shipping-sms-confirmation', '', false, ['parent' => $this->has_shipping_sms_confirmation, 'data' => $this->smsConfirmation])->component('blocks.boxes.input.depends'),
            BoxInput::make('barcode-nomenclature',__('Nomenclature'), 'select', 'barcode_nomenclature', 'barcode-scanner', '', false, ['parent' => $this->has_barcode_scanner, 'data' => $this->nomenclatures])->component('blocks.boxes.input.depends'),
        ];
    }
    
    public function actions() : array
    {
        return [
            BoxAction::make('warehouse-location', 'locations', __('Locations'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_storage_locations])->component('blocks.boxes.action.depends'),
            BoxAction::make('attributes', 'product-variant', __('Attributes'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_variant])->component('blocks.boxes.action.depends'),
            BoxAction::make('uom', 'product-uom', __('Units of Measure'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_uom])->component('blocks.boxes.action.depends'),
            BoxAction::make('product-packaging', 'product-packaging', __('Product Packaging'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_packaging])->component('blocks.boxes.action.depends'),
            BoxAction::make('serial-number', 'product-serial-number', __('Serial Numbers'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_serial_number])->component('blocks.boxes.action.depends'),
            BoxAction::make('configure-barcode', 'barcode-scanner', __('Configure Product Barcode'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_barcode_scanner])->component('blocks.boxes.action.depends'),
            // BoxAction::make('warehouse-location', 'product-', __('Locations'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_storage_locations])->component('blocks.boxes.action.depends'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;
        $setting->update([
            'has_packaging' => $this->has_packaging,
            'has_batch_tranfer' => $this->has_batch_tranfer,
            'has_warnings' => $this->has_warnings,
            'has_quality' => $this->has_quality,
            'has_receipt_report' => $this->has_receipt_report,
            'has_barcode_scanner' => $this->has_barcode_scanner,
            'has_show_qty_to_count' => $this->has_show_qty_to_count,
            'has_stock_barcode_database' => $this->has_stock_barcode_database,
            'barcode_nomenclature_id' => $this->barcode_nomenclature,
            'has_shipping_email_confirmation' => $this->has_shipping_email_confirmation,
            'has_shipping_sms_confirmation' => $this->has_shipping_sms_confirmation,
            'has_shipping_signature' => $this->has_shipping_signature,
            'has_delivery_method' => $this->has_delivery_method,
            'has_variant' => $this->has_variant,
            'has_uom' => $this->has_uom,
            'has_serial_number' => $this->has_serial_number,
            'has_consignment' => $this->has_consignment,
            'has_landed_cost' => $this->has_landed_cost,
            'has_storage_locations' => $this->has_storage_locations,
            'has_storage_categories' => $this->has_storage_categories,
            'has_multistep_routes' => $this->has_multistep_routes,
            'annual_inventory_day' => $this->annual_inventory_day,
            'annual_inventory_month' => $this->annual_inventory_month,
            'picking_policy' => $this->picking_policy,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
        return redirect()->route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'inventory', 'menu' => current_menu()]);
    }
}
