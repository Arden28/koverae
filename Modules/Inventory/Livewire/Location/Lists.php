<?php

namespace Modules\Inventory\Livewire\Location;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.location.lists')
        ->extends('layouts.master');
    }
}
