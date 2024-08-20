<?php

namespace Modules\Sales\Livewire\Analysis;

use Livewire\Component;

class SalesAnalysis extends Component
{
    public function render()
    {
        return view('sales::livewire.analysis.sales-analysis')
        ->extends('layouts.master');
    }
}