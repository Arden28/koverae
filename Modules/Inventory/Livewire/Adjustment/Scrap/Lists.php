<?php

namespace Modules\Inventory\Livewire\Adjustment\Scrap;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.adjustment.scrap.lists')
        ->extends('layouts.master');
    }
}
