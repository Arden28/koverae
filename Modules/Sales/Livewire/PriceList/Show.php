<?php

namespace Modules\Sales\Livewire\PriceList;

use Livewire\Component;
use Modules\Sales\Entities\Price\PriceList;

class Show extends Component
{
    public $pricelist;

    public function mount (PriceList $pricelist){
        $this->pricelist = $pricelist;
    }
    
    public function render()
    {
        return view('sales::livewire.price-list.show')
        ->extends('layouts.master');
    }
}
