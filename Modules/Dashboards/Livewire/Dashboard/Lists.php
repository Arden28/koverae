<?php

namespace Modules\Dashboards\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Dashboards\Entities\Dashboard;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of dashboards to show

    public $selectedDash = []; //Checkbox select

    public $deleteId = '';

    public function render()
    {
        $dashboards = Dashboard::isCompany(current_company()->id)->paginate($this->show);
        return view('dashboards::livewire.dashboard.lists', compact('dashboards'))->layout('layouts.master');
    }

    public function selectedId($id){
        return $this->deleteId == $id;
    }

    public function delete($deleteId)
    {
        Dashboard::find($deleteId)->delete();

        notify()->success("Le tableau de bord a bien été supprimé !");
    }

}
