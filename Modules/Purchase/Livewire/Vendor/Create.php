<?php

namespace Modules\Purchase\Livewire\Vendor;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('purchase::livewire.vendor.create')
        ->extends('layouts.master');
    }
}
