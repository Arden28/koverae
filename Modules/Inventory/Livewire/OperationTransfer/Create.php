<?php

namespace Modules\Inventory\Livewire\OperationTransfer;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.operation-transfer.create')
        ->extends('layouts.master');
    }
}
