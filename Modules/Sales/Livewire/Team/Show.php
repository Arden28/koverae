<?php

namespace Modules\Sales\Livewire\Team;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportNavigate\SupportNavigate;
use Modules\Employee\Entities\Employee;
use Modules\Sales\Entities\SalesTeam;

class Show extends Component
{
    public $team;

    public $name, $leader, $alias, $invoice_target, $leaders;

    public $domain_email;

    // Real-time validation rules
    protected $rules = [
        'name' => 'required|string|max:60',
        'leader' => 'nullable|integer',
        'alias' => 'nullable|string',
        'invoice_target' => 'nullable|integer',
        // 'company' => 'require|gt:0',
    ];

    public function mount($team){
        $this->domain_email = current_company()->domain_name.'.koverae.com';
        $this->team = $team;
        $this->name = $this->team->name;
        $this->leader = $this->team->team_leader_id;
        $alias = $this->team->email_alias;
        // Split the email address by '@' and get the first part
        $emailParts = explode('@', $alias);
        $this->alias = $emailParts[0];
        $this->invoice_target = $this->team->invoice_target;
        $this->leaders = Employee::isCompany(current_company()->id)->get();
    }

    public function render()
    {
        return view('sales::livewire.team.show')
        ->extends('layouts.master');
    }

    public function update($team){
        $this->validate();
        $team = SalesTeam::find($team);

        $team->update([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'team_leader_id' => $this->leader,
            'email_alias' => $this->alias.'@'.$this->domain_email,
            'invoice_target' => $this->invoice_target,
        ]);

        notify()->success('message', 'Equipe mise à jour.');

    }

    public function new(){
        return $this->redirect(route('sales.teams.create', ['subdomain' => current_company()->domain_name]), navigate:true);
    }

}
