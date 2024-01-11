<?php

namespace Modules\Inventory\Livewire\Product\Category;

use Livewire\Component;
use Modules\Inventory\Entities\Category;

class Show extends Component
{
    public Category $category;

    public function mount($category){
        $this->category = $category;
    }
    public function render()
    {
        return view('inventory::livewire.product.category.show')
        ->extends('layouts.master');
    }
}
