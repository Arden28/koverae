<?php

namespace Modules\Inventory\Livewire\Warehouse;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.warehouse.lists')
        ->extends('layouts.master');
    }
}
