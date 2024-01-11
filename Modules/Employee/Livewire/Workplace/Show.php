<?php

namespace Modules\Employee\Livewire\Workplace;

use Livewire\Component;
use Modules\Employee\Entities\Workplace;

class Show extends Component
{
    public Workplace $workplace;

    public function mount($workplace){

        $this->workplace = $workplace;

    }
    public function render()
    {
        return view('employee::livewire.workplace.show')
        ->extends('layouts.master');
    }
}
