<?php

namespace Modules\Purchase\Livewire\Vendor;

use Livewire\Component;
use Modules\Contact\Entities\Contact;

class Show extends Component
{
    public $vendor;

    public function mount (Contact $vendor){
        $this->vendor = $vendor;
    }
    public function render()
    {
        return view('purchase::livewire.vendor.show')
        ->extends('layouts.master');
    }
}
