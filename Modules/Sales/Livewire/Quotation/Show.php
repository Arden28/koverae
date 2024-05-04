<?php

namespace Modules\Sales\Livewire\Quotation;

use Livewire\Component;
use Modules\Sales\Entities\Quotation\Quotation;

class Show extends Component
{
    public $quotation;

    public function mount (Quotation $quotation){
        $this->quotation = $quotation;
    }

    public function render()
    {
        return view('sales::livewire.quotation.show')
        ->extends('layouts.master');
    }
    
}
