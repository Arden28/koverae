<?php

namespace Modules\Pos\Livewire\PosOrder;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('pos::livewire.pos-order.lists')
        ->extends('layouts.master');
    }
}
