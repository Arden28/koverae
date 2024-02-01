<?php

namespace Modules\Employee\Livewire\Form;

use App\Livewire\Form\Template\SimpleForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use Modules\Employee\Entities\Job;

class JobForm extends SimpleForm
{
    public $job;

    public $title, $description, $newers = 1, $job_type, $job_types, $department, $departments, $updateMode = false;

    public function mount($job = null){
        if($job){
            $this->title = $job->title;
            $this->description = $job->description;
            $this->newers = $job->newers;
            $this->job_type = $job->job_type_id;
            $this->department = $job->department_id;
            $this->updateMode = true;
        }

    }

    protected $rules = [
        'title' => 'required|string|max:60',
        'description' => 'nullable|string|max:500',
        'newers' => 'nullable|integer',
        'department' => 'nullable|gt:0',
        'job_type' => 'nullable|gt:0',
    ];

    public function form() : string
    {
        if($this->updateMode == false){
            return 'storeOperationType';
        }else{
            return '';
        }
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('title', "Poste", 'text', 'title', 'top-title', 'none', 'none', 'ex: Directeur Commercial')->component('inputs.ke-title'),
            Input::make('department',"Département", 'select', 'department', 'left', 'general', 'general_info')->component('inputs.select.employees.department'),
            Input::make('job_type',"Type de poste", 'select', 'job_type', 'left', 'general', 'general_info')->component('inputs.select.employees.job-type'),
            Input::make('newers','Cibles', 'text', 'newers', 'right', 'general', 'general_info')->component('inputs.employees.target-newer'),
            //
            Input::make('description','Résumé', 'textarea', 'description', '', 'summary', 'none')->component('inputs.textarea.tabs-middle'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('general','Recrutement'),
            Tabs::make('summary','Résumé du poste')->component('tabs.note.summary'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('general_info',"Informations Générales", 'general')->component('tabs.group.light'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new'),
            ActionBarButton::make('store', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    public function statusBarButtons() : array
    {
        return [

        ];
    }

    public function capsules() : array
    {
        return [

        ];
    }

    public function actionButtons() : array
    {
        return [

        ];
    }

    public function new(){
        return redirect(route('employee.jobs.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]));
    }

    public function store(){
        $this->validate();

        $job = Job::create([
            'company_id' => current_company()->id,
            'title' => $this->title,
            'description' => $this->description,
            'newers' => $this->newers,
            'department_id' => $this->department,
            'job_type_id' => $this->job_type
        ]);
        $job->save();

        // notify()->success('message', __("L'emploi a bien été ajouté !"));
    }

    public function update(){
        $this->validate();

        $job = job::find($this->job->id);

        $job->update([
            'title' => $this->title,
            'description' => $this->description,
            'newers' => $this->newers,
            'department_id' => $this->department,
            'job_type_id' => $this->job_type,
        ]);
        $job->save();
        // return $this->redirect(route('inventory.operation-types.show', ['type' => $type->id, 'subdomain' => current_company()->domain_name]), navigate:true);
    }
}
