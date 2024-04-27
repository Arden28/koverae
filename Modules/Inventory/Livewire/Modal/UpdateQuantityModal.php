<?php

namespace Modules\Inventory\Livewire\Modal;

use Livewire\Component;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;
use Modules\Inventory\Entities\Product;

class UpdateQuantityModal extends ModalComponent
{
    public Product $product;

    public $quantity = 1;

    public function mount($product){
        $this->product = $product;
        $this->quantity = $product->product_quantity;
    }

    protected $rules = [
        'quantity' => 'integer|required|min:1',
    ];

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function render()
    {
        return view('inventory::livewire.modal.update-quantity-modal');
    }

    public function updateQty(){
        $this->validate();

        $product = $this->product;

        $product->update([
            'product_quantity' => $this->quantity,
        ]);

        session()->flash('message', 'La quantité a bien été modifiée.'); // Optional: flash a success message
        return redirect()->route('inventory.products.show', ['product' => $this->product->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }
}
