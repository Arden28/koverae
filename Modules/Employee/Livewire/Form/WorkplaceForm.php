<?php

namespace Modules\Employee\Livewire\Form;

use App\Livewire\Form\Template\LightWeightForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use Modules\Employee\Entities\Workplace;

class WorkplaceForm extends LightWeightForm
{

    public $workplace;

    public $title, $icon;

    public bool $updateMode = false;

    public function mount($workplace = null){

        if($workplace){
            $this->workplace = $workplace;
            $this->title = $workplace->title;
            $this->icon = $workplace->icon;
            $this->updateMode = true;
        }

    }
    protected $rules = [
        'title' => 'required|string',
        'icon' => 'nullable|string',
    ];

    public function new(){
        return redirect()->route('employee.workplaces.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

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
            Input::make('title', "Lieux de travail", 'text', 'title', 'left', 'none', 'none'),
            Input::make('icon',"Icon", 'text', 'icon', 'left', 'none', 'none'),
        ];
    }


    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('store', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->icon = '';
    }

    public function store(){

        $this->validate();

        $workplace = Workplace::create([
            'company_id' => current_company()->id,
            'title' => $this->title,
            'icon' => $this->icon,
        ]);

        session()->flash('message', __('Le lieu de travail a été ajouté !'));

        $workplace->save();

        // return redirect()->route('employee.workplaces.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function update(){
        $this->validate();
        $workplace = Workplace::find($this->workplace->id);

        $workplace->update([
            'title' => $this->title,
            'icon' => $this->icon,
        ]);
        $workplace->save();

        // Actualize the variables
        $this->title = $workplace->title;
        $this->icon = $workplace->icon;
    }

}
