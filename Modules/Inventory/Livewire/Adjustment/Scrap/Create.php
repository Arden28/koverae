<?php

namespace Modules\Inventory\Livewire\Adjustment\Scrap;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.adjustment.scrap.create')
        ->extends('layouts.master');
    }
}
