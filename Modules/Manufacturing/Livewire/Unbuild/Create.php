<?php

namespace Modules\Manufacturing\Livewire\Unbuild;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.unbuild.create')
        ->extends('layouts.master');
    }
}
