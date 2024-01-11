<?php

namespace Modules\Inventory\Livewire\Adjustment\Physical;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.adjustment.physical.create')
        ->extends('layouts.master');
    }
}
