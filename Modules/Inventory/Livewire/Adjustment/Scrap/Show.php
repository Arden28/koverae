<?php

namespace Modules\Inventory\Livewire\Adjustment\Scrap;

use Livewire\Component;
use Modules\Inventory\Entities\Adjustment\ScrapOrder;

class Show extends Component
{
    public ScrapOrder $scrap;

    public function mount($scrap){
        $this->scrap = $scrap;
    }

    public function render()
    {
        return view('inventory::livewire.adjustment.scrap.show')
        ->extends('layouts.master');
    }
}
