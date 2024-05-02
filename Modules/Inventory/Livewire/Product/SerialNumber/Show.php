<?php

namespace Modules\Inventory\Livewire\Product\SerialNumber;

use Livewire\Component;
use Modules\Inventory\Entities\Serial\SerialNumber;

class Show extends Component
{
    public SerialNumber $lot;

    public function mount($lot){
        $this->lot = $lot;
    }

    public function render()
    {
        return view('inventory::livewire.product.serial-number.show')
        ->extends('layouts.master');
    }
}
