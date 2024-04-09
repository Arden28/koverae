<?php

namespace Modules\Dashboards\Livewire;

use Livewire\Component;
use Modules\Dashboards\Entities\Dashboard;
use Livewire\Attributes\Url;

class Overview extends Component
{
    #[Url(as: 'view', keep: true)]
    public $view = 'sales_dashboard';

    public function render()
    {
        $dashboards = Dashboard::isCompany(current_company()->id)->isEnabled()->get();
        return view('dashboards::livewire.overview', compact('dashboards'))
        ->extends('layouts.master');
    }

    public function changeDash($slug){
        return $this->view = $slug;
    }
}
