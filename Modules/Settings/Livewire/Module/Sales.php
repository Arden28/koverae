<?php

namespace Modules\Settings\Livewire\Module;

use Livewire\Component;

class Sales extends Component
{
    public bool $variants, $uom, $package, $send_email, $discounts, $sale_program, $margin, $customer_account, $sale_warnings, $lock_confirmed_sales, $pro_format_invoice, $shipping_cost;
    public $invoice_policy;


    public function render()
    {
        return view('settings::livewire.module.sales');
    }

}
