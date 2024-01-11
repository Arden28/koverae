<?php

namespace Modules\Inventory\Livewire\Warehouse;

use Livewire\Component;
use Modules\Inventory\Entities\Warehouse\Warehouse;

class Show extends Component
{
    public Warehouse $warehouse;

    public function mount($warehouse){
        $this->warehouse = $warehouse;
    }
    public function render()
    {
        return view('inventory::livewire.warehouse.show')
        ->extends('layouts.master');
    }
}
