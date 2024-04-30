<?php

namespace Modules\Inventory\Livewire\Product\Packaging;

use Livewire\Component;
use Modules\Inventory\Entities\Product\ProductPackaging;

class Show extends Component
{
    public ProductPackaging $packaging;

    public function mount($packaging){
        $this->packaging = $packaging;
    }

    public function render()
    {
        return view('inventory::livewire.product.packaging.show')
        ->extends('layouts.master');
    }
}
