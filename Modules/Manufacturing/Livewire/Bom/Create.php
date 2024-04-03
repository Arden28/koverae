<?php

namespace Modules\Manufacturing\Livewire\Bom;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.bom.create')
        ->extends('layouts.master');
    }
}
