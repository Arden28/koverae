<?php

namespace Modules\Inventory\Livewire\Location;

use Livewire\Component;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class Show extends Component
{
    public WarehouseLocation $location;

    public function mount($location){
        $this->location = $location;
    }

    public function render()
    {
        return view('inventory::livewire.location.show')
        ->extends('layouts.master');
    }
}
