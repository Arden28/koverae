<?php

namespace Modules\Contact\Livewire\Bank;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;

class Create extends Component
{
    public function render()
    {
        return view('contact::livewire.bank.create')
        ->extends('layouts.master');
    }
}
