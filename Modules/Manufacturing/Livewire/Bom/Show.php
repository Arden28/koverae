<?php

namespace Modules\Manufacturing\Livewire\Bom;

use Livewire\Component;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;

class Show extends Component
{
    public BillOfMaterial $bom;

    public function mount($bom){
        $this->bom = $bom;
    }

    public function render()
    {
        return view('manufacturing::livewire.bom.show')
        ->extends('layouts.master');
    }
}
