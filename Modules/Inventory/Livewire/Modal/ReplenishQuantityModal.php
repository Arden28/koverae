<?php

namespace Modules\Inventory\Livewire\Modal;

use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Product\ProductSupplier;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;
use Modules\Purchase\Entities\Request\RequestQuotation;
use Modules\Purchase\Entities\Request\RequestQuotationDetail;

class ReplenishQuantityModal extends ModalComponent
{
    public Product $product;

    public $quantity = 1;
    public $schedule_date;
    public $route;
    public $status = 'request';

    public $supplier;

    public function mount($product){
        $this->product = $product;
        $this->schedule_date = Carbon::now()->format('Y-m-d H:i:s');
        $this->route = 'buy';

    }

    protected $rules = [
        'quantity' => 'integer|required|min:1',
        'schedule_date' => 'required',
        'route' => 'string|required'
    ];

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function render()
    {
        $routes = WarehouseRoute::isCompany(current_company()->id)->get();
        $suppliers = ProductSupplier::isCompany(current_company()->id)->get();
        return view('inventory::livewire.modal.replenish-quantity-modal', compact('routes', 'suppliers', 'suppliers'));
    }

    public function replenish(){
        $this->validate();

        // Launch a request of quotation for the purchase
        $supplier = ProductSupplier::find($this->supplier);
        $product = $this->product;
        $total = calculate_item_cost($product) * $this->quantity;
        $total_untaxed = $product->product_cost * $this->quantity;

        $rfq = RequestQuotation::create([
            'company_id' => current_company()->id,
            'supplier_id' => $supplier->id,
            'deadline_date' => Carbon::parse($this->schedule_date)->subDays($supplier->delivery_lead_time),
            'date' => now(),
            'expected_arrival_date' => $this->schedule_date,
            'supplier_reference' => $supplier->contact->reference,
            'buyer_id' => $supplier->contact->buyer_id,
            'source_document' => __('Réassortissement manuel'),
            'total_amount' => $total * 100,
            'status' => $this->status,
            'tax_amount' => $total_untaxed,
        ]);
        $rfq->save();

        $rfq_detail = RequestQuotationDetail::create([
            'request_quotation_id' => $rfq->id,
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'product_code' => '['.$product->product_code.']',
            'quantity' => $this->quantity,
            'price' => $supplier->product_cost,
            'unit_price' => $supplier->product_cost,
            'sub_total' => $supplier->product_cost * $this->quantity,
        ]);
        $rfq_detail->save();

        session()->flash('message', __('translator::components.modals.replenish-qty.messages.replenish-success', ['reference' => $rfq->reference])); // Optional: flash a success message

        $this->closeModal();
    }

}