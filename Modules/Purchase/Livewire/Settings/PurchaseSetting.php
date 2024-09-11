<?php

namespace Modules\Purchase\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class PurchaseSetting extends AppSetting
{
    public $setting, $company;

    public bool $has_order_approval,  $has_lock_confirm_order, $has_warnings, $has_receipt_reminder, $has_purchase_agreements, $has_variant, $has_uom, $has_packaging, $has_way_matching;
    public $min_amount = 100000, $bill_policy;

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        $this->setting = $setting;
        $this->has_order_approval = $setting->has_order_approval;
        $this->min_amount = $setting->minimum_order_ammount;
        $this->has_lock_confirm_order = $setting->has_lock_confirm_order;
        $this->has_warnings = $setting->has_warnings;
        $this->has_receipt_reminder = $setting->has_receipt_reminder;
        $this->has_purchase_agreements = $setting->has_purchase_agreements;
        $this->has_variant = $setting->has_variant;
        $this->has_uom = $setting->has_uom;
        $this->has_packaging = $setting->has_packaging;
        $this->bill_policy = $setting->bill_policy;
        $this->has_way_matching = $setting->has_way_matching;
    }

    public function blocks() : array
    {
        return [
            Block::make('orders', __('Orders')),
            Block::make('product', __('Products')),
            Block::make('invoicing', __('Invoicing')),
            // Block::make('logistics', __('Logistics')),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // Order
            Box::make('approval-order', __('Purchase Order Approval'), 'has_order_approval', __("Require managers to approve orders exceeding a minimum amount"), 'orders', true),
            Box::make('lock-confirm-order', __('Lock Confirmed Orders'), 'has_lock_confirm_order', __("Automatically lock confirmed orders to prevent any modifications"), 'orders', true),
            Box::make('purchase-warnings', __('Warnings'), 'has_warnings', __("Receive warnings in product or supplier orders"), 'orders', true),
            Box::make('receipt-reminder', __('Receipt Reminders'), 'has_receipt_reminder', __("Automatically remind suppliers of the receipt date"), 'orders', true),
            Box::make('purchase-agreements', __("Purchase Agreements"), 'has_purchase_agreements', __("Manage your purchase contracts (tenders, provisional orders)"), 'orders', true),
            // Products
            Box::make('product-variant', __('Variants'), 'has_variant', __("Sell product variants using attributes (size, color, etc.)"), 'product', true),
            Box::make('product-uom', __('Units of Measure'), 'has_uom', __("Sell and buy products in various units of measure"), 'product', true),
            Box::make('product-packaging', __('Product Packaging'), 'has_packaging', __("Sell products in multiples of the number of units per package"), 'product', true),
            // Invoicing
            Box::make('bill-policy', __('Billing Policy'), 'bill_policy', __("Quantities billed by suppliers"), 'invoicing', false)->component('blocks.boxes.ratio.bill-policy'),
            Box::make('way-matching', __('Three-Way Matching'), 'has_way_matching', __("Ensure you only pay for invoices for which you have received the goods you ordered"), 'invoicing', true),
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('minimum-amount',__('Mininmum Amount'), 'text', 'min_amount', 'approval-order', '', false, ['parent' => $this->has_order_approval])->component('blocks.boxes.input.minimum-amount'),
        ];
    }
    
    public function actions() : array
    {
        return [
            BoxAction::make('attributes', 'product-variant', __('Attributes'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_variant])->component('blocks.boxes.action.depends'),
            BoxAction::make('uom', 'product-uom', __('Units of Measure'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_uom])->component('blocks.boxes.action.depends'),
            BoxAction::make('product-packaging', 'product-packaging', __('Product Packaging'), 'link', 'bi-arrow-right', "",  ['parent' => $this->has_packaging])->component('blocks.boxes.action.depends'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_order_approval' => $this->has_order_approval,
            'minimum_order_ammount' => $this->min_amount,
            'has_lock_confirm_order' => $this->has_lock_confirm_order,
            'has_warnings' => $this->has_warnings,
            'has_receipt_reminder' => $this->has_receipt_reminder,
            'has_purchase_agreements' => $this->has_purchase_agreements,
            'has_variant' => $this->has_variant,
            'has_uom' => $this->has_uom,
            'has_packaging' => $this->has_packaging,
            'bill_policy' => $this->bill_policy,
            'has_way_matching' => $this->has_way_matching,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes have been saved');
        return redirect()->route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'purchase', 'menu' => current_menu()]);
    }

}
