<?php

namespace Modules\Inventory\Livewire\Location;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.location.create')
        ->extends('layouts.master');
    }
}
