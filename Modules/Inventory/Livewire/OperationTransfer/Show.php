<?php

namespace Modules\Inventory\Livewire\OperationTransfer;

use Livewire\Component;
use Modules\Inventory\Entities\Operation\OperationTransfer;

class Show extends Component
{
    public OperationTransfer $transfer;

    public function mount($transfer){
        $this->transfer = $transfer;
    }

    public function render()
    {
        return view('inventory::livewire.operation-transfer.show')
        ->extends('layouts.master');
    }
}
