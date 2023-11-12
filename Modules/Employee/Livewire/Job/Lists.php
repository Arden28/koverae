<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;
use Modules\Employee\Entities\Job;

class Lists extends Component
{
    public $deleteId = '';

    public function render()
    {
        $jobs = Job::isCompany(current_company()->id)->get();
        return view('employee::livewire.job.lists', compact('jobs'));
    }

    public function selectedId($id){
        return $this->deleteId == $id;
    }

    public function delete($deleteId)
    {
        Job::find($deleteId)->delete();

        notify()->success("L'emploi a bien été supprimé !");
    }
}
