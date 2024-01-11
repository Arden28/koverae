<?php

namespace Modules\Inventory\Livewire\Adjustment\Physical;

use Livewire\Component;
use Modules\Inventory\Entities\Adjustment\ScrapOrder;

class Show extends Component
{
    public ScrapOrder $adjustment;

    public function mount($adjustment){
        $this->adjustment = $adjustment;
    }

    public function render()
    {
        return view('inventory::livewire.adjustment.physical.show')
        ->extends('layouts.master');
    }
}
