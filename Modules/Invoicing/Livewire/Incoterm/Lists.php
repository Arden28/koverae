<?php

namespace Modules\Invoicing\Livewire\Incoterm;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('invoicing::livewire.incoterm.lists')
        ->extends('layouts.master');
    }
}
