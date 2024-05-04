<?php

namespace Modules\Sales\Livewire\Quotation;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Sales\Entities\Quotation\Quotation;

class Lists extends Component
{
    public function render()
    {
        return view('sales::livewire.quotation.lists')
        ->extends('layouts.master');
    }

}
