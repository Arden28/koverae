<?php

namespace Modules\Manufacturing\Livewire\Bom;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.bom.lists')
        ->extends('layouts.master');
    }
}
