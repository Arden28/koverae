<?php

namespace Modules\Inventory\Livewire;

use Livewire\Component;
use Modules\Inventory\Entities\Operation\OperationType;

class Overview extends Component
{
    public function render()
    {
        $operations = OperationType::isCompany(current_company()->id)->get();
        return view('inventory::livewire.overview', compact('operations'))
        ->extends('layouts.master');
    }
}
