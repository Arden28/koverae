<?php

namespace Modules\Inventory\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\Inventory\Entities\Product;
use Modules\Sales\Entities\Price\PriceList;

class PrintLabelModal extends ModalComponent
{
    public Product $product;
    public $quantity, $format, $pricelist, $extra;

    public function mount($product){
        $this->product = $product;
        $this->quantity = 1;
        $this->format = 'dymo';
    }

    protected $rules = [
        'quantity' => 'integer|required|gt:0',
        'format' => 'required|string',
        'pricelist' => 'nullable|exists:price_lists,id',
        'extra' => 'nullable|string',
    ];

    public function render()
    {
        $pricelists = PriceList::isCompany(current_company()->id)->get();
        return view('inventory::livewire.modal.print-label-modal', compact('pricelists'));
    }

    public function print(){
        $this->validate();
        // Close the modal
        $this->closeModal();
    }
}