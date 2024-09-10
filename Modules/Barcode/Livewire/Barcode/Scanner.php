<?php

namespace Modules\Barcode\Livewire\Barcode;

use Livewire\Component;

class Scanner extends Component
{
    public function render()
    {
        return view('barcode::livewire.barcode.scanner')
        ->extends('layouts.master');
    }
}
