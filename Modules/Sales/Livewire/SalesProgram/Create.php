<?php

namespace Modules\Sales\Livewire\SalesProgram;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('sales::livewire.sales-program.create')
        ->extends('layouts.master');
    }
}
