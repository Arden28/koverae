<?php

namespace Modules\Contact\Livewire\Bank;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;

class Show extends Component
{
    public Bank $bank;
    public function mount(Bank $bank){
        $this->bank = $bank;

    }
    public function render()
    {
        return view('contact::livewire.bank.show')
        ->extends('layouts.master');
    }
}
