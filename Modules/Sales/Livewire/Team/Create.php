<?php

namespace Modules\Sales\Livewire\Team;

use Livewire\Component;
use Modules\Employee\Entities\Employee;
use Modules\Sales\Entities\SalesTeam;

class Create extends Component
{
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

    public function mount(){
        $this->domain_email = current_company()->domain_name.'.koverae.com';
        $this->leaders = Employee::isCompany(current_company()->id)->get();
    }

    public function render()
    {
        return view('sales::livewire.team.create')
        ->extends('layouts.master');
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

    public function new(){
        return $this->redirect(route('sales.teams.create', ['subdomain' => current_company()->domain_name]), navigate:true);
    }
}
