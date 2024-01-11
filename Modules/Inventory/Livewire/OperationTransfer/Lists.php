<?php

namespace Modules\Inventory\Livewire\OperationTransfer;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.operation-transfer.lists')
        ->extends('layouts.master');
    }
}
