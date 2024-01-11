<?php

namespace Modules\Inventory\Livewire\Warehouse\Routes;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.warehouse.routes.lists')
        ->extends('layouts.master');
    }
}
