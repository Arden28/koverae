<?php

namespace Modules\Sales\Livewire\SalesProgram;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('sales::livewire.sales-program.lists')
        ->extends('layouts.master');
    }
}
