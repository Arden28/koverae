<?php

namespace Modules\Inventory\Livewire\Warehouse;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.warehouse.create')
        ->extends('layouts.master');
    }
}
