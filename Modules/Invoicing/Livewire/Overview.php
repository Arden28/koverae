<?php

namespace Modules\Invoicing\Livewire;

use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        return view('invoicing::livewire.overview')
        ->extends('layouts.master');
    }
}
