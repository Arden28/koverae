<?php

namespace Modules\Inventory\Livewire;

use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        return view('inventory::livewire.overview')
        ->extends('layouts.master');
    }
}
