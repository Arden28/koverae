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
use Livewire\Attributes\On;
use Modules\Sales\Entities\SalesTeam;

class SalesTeamForm extends SimpleForm
{
    public SalesTeam $team;

    public $name, $leader, $alias, $invoice_target, $leaders;

    public $domain_email;
    public $members;

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
            $this->members = $this->team->members;
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
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', __('translator::components.inputs.sale-team-name.label'), 'text', 'name', 'top-title', 'none', 'none', __('translator::components.inputs.sale-team-name.placeholder'))->component('inputs.ke-title'),
            Input::make('team_leader_id',__('translator::components.inputs.sale-team-leader.label'), 'select', 'leader', 'left', 'none', 'team')->component('inputs.select.sales.seller'),
            Input::make('alias_email',__('translator::components.inputs.email-alias.label'), 'text', 'alias', 'left', 'none', 'team', 'none')->component('inputs.email-alias'),
            Input::make('invoice_target',__('translator::components.inputs.invoice-target.label'), 'text', 'invoice_target', 'left', 'none', 'team', 'none', __('translator::components.inputs.invoice-target.title'))->component('inputs.invoice-target'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('member',__('translator::sales.form.team.tabs.members'))->component('tabs.member'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('team',__('translator::sales.form.team.groups.team'), 'none'),
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

    #[On('create-team')]
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


    #[On('update-team')]
    public function update(){
        $this->validate();
        // $team = SalesTeam::find($team);

        $this->team->update([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'team_leader_id' => $this->leader,
            'email_alias' => $this->alias.'@'.$this->domain_email,
            'invoice_target' => $this->invoice_target,
        ]);
        $this->team->save();

        notify()->success('message', 'Equipe mise à jour.');
        return redirect()->route('sales.teams.show', ['subdomain' => current_company()->domain_name, 'menu' => current_menu(), 'team' => $this->team->id]);

    }

    public function new(){
        return $this->redirect(route('sales.teams.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]), navigate:true);
    }

    // Update Members
    #[On('update-members')]
    public function actualizeMembers(){
        $this->members = $this->team->members;
    }
}