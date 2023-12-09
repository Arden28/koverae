<?php

namespace Modules\Purchase\Livewire\Vendor;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('purchase::livewire.vendor.lists')
        ->extends('layouts.master');
    }
}
