<?php

namespace Modules\Crm\Livewire\Pipeline;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('crm::livewire.pipeline.lists')
        ->extends('layouts.master');
    }
}
