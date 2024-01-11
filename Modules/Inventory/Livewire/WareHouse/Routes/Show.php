<?php

namespace Modules\Inventory\Livewire\Warehouse\Routes;

use Livewire\Component;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;

class Show extends Component
{
    public WarehouseRoute $route;

    public function mount($route){
        $this->route = $route;
    }
    public function render()
    {
        return view('inventory::livewire.warehouse.routes.show')
        ->extends('layouts.master');
    }
}
