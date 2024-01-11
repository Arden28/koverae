<?php

namespace Modules\Inventory\Livewire\OperationType;

use Livewire\Component;
use Modules\Inventory\Entities\Operation\OperationType;

class Show extends Component
{
    public OperationType $type;

    public function mount($type){
        $this->type = $type;
    }

    public function render()
    {
        return view('inventory::livewire.operation-type.show')
        ->extends('layouts.master');
    }
}
