<?php

namespace Modules\Dashboards\Livewire;

use Livewire\Component;
use Modules\Dashboards\Entities\Dashboard;

class Overview extends Component
{
    public function render()
    {
        $dashboards = Dashboard::isCompany(current_company()->id)->isEnabled()->get();
        return view('dashboards::livewire.overview', compact('dashboards'))
        ->extends('layouts.master');
    }
}
