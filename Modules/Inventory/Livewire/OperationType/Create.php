<?php

namespace Modules\Inventory\Livewire\OperationType;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.operation-type.create')
        ->extends('layouts.master');
    }
}
