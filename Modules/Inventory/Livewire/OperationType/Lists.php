<?php

namespace Modules\Inventory\Livewire\OperationType;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.operation-type.lists')
        ->extends('layouts.master');
    }
}
