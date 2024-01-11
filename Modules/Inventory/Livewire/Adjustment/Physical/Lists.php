<?php

namespace Modules\Inventory\Livewire\Adjustment\Physical;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.adjustment.physical.lists')
        ->extends('layouts.master');
    }
}
