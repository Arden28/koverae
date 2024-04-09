<?php

namespace Modules\Dashboards\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Dashboards\Entities\Dashboard;

class Lists extends Component
{

    public function render()
    {
        $dashboards = Dashboard::isCompany(current_company()->id)->get();
        return view('dashboards::livewire.dashboard.lists', compact('dashboards'))
        ->extends('layouts.master');
    }


}
