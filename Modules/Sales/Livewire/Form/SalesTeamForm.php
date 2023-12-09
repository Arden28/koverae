<?php

namespace Modules\Sales\Livewire\Form;

use Livewire\Component;
use App\Livewire\Form\Template\SimpleForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use Modules\Sales\Entities\SalesTeam;

class SalesTeamForm extends SimpleForm
{
    public $team;

    public $name, $leader, $alias, $invoice_target, $leaders;

    public $domain_email;

    public $updateMode = false;

    // Real-time validation rules
    protected $rules = [
        'name' => 'required|string|max:60',
        'leader' => 'nullable|integer',
        'alias' => 'nullable|string',
        'invoice_target' => 'nullable|integer',
        // 'company' => 'require|gt:0',
    ];

    public function mount($team = null){
        if($team){
            $this->updateMode = true;

            $this->domain_email = current_company()->domain_name.'.koverae.com';
            $this->team = $team;
            $this->name = $this->team->name;
            $this->leader = $this->team->team_leader_id;
            $alias = $this->team->email_alias;
            // Split the email address by '@' and get the first part
            $emailParts = explode('@', $alias);
            $this->alias = $emailParts[0];
            $this->invoice_target = $this->team->invoice_target;
            // $this->leaders = Employee::isCompany(current_company()->id)->get();
        }
    }

    public function form() : string
    {
        if($this->updateMode = false){
            return 'storeTeam()';
        }else{
            return 'update({{ $team->id }})';
        }
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null)
            Input::make('name', "Nom de l'équipe", 'text', 'name', 'top-title', 'none', 'none', 'Ex: Equipe Commerciale')->component('inputs.ke-title'),
            Input::make('team_leader_id',"Chef d'équipe", 'select', 'leader', 'left', 'none', 'team')->component('inputs.select.sales.seller'),
            Input::make('alias_email','Alias', 'text', 'alias', 'left', 'none', 'team')->component('inputs.email-alias'),
            Input::make('invoice_target','Objectif', 'text', 'invoice_target', 'left', 'none', 'team', "Objectif de revenus pour le mois en cours (total hors taxe des factures confirmées)")->component('inputs.invoice-target'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('member','Membres')->component('tabs.member'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('team',"Détail de l'équipe"),
        ];
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('storeTeam', 'Enregistrer', 'storeTeam()'),
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

    public function storeTeam(){
        $this->validate();

        $team = SalesTeam::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'team_leader_id' => $this->leader,
            'email_alias' => $this->alias.'@'.$this->domain_email,
            'invoice_target' => $this->invoice_target,
        ]);

        notify()->success('message', 'Equipe créée.');

    }
}
