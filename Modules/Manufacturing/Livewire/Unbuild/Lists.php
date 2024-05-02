<?php

namespace Modules\Manufacturing\Livewire\Unbuild;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.unbuild.lists')
        ->extends('layouts.master');
    }
}
