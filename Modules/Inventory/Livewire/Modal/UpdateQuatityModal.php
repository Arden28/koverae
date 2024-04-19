<?php

namespace Modules\Inventory\Livewire\Modal;

use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;

class UpdateQuatityModal extends ModalComponent
{
    public Product $product;

    public $quantity = 1;
    public $schedule_date;
    public $route;

    public function mount($product){
        $this->product = $product;
        $this->schedule_date = Carbon::now()->format('Y-m-d H:i:s');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function render()
    {
        $routes = WarehouseRoute::isCompany(current_company()->id)->get();
        return view('inventory::livewire.modal.update-quatity-modal', compact('routes'));
    }
}
