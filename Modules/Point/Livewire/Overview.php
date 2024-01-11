<?php

namespace Modules\Point\Livewire;

use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        return view('point::livewire.overview')
        ->extends('layouts.master');
    }
}
