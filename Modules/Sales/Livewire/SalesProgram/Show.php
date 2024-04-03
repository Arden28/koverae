<?php

namespace Modules\Sales\Livewire\SalesProgram;

use Livewire\Component;
use Modules\Sales\Entitie\Program\SalesProgram;

class Show extends Component
{
    public $program;

    public function mount (SalesProgram $program){
        $this->program = $program;
    }
    public function render()
    {
        return view('sales::livewire.sales-program.show')
        ->extends('layouts.master');
    }
}
