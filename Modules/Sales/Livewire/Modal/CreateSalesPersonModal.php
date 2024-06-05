<?php

namespace Modules\Sales\Livewire\Modal;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Modules\Employee\Entities\Employee;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Modules\Sales\Entities\SalesTeamMember;

class CreateSalesPersonModal extends ModalComponent
{
    public SalesTeam $team;
    public $name, $email, $phone;
    public bool $isEmployee = true;

    public function mount($team){
        $this->team = $team;
    }

    protected $rules = [
        'name' => 'required|max:50',
        'email' =>'required|email|max:50|unique:users,email',
        'phone' =>'required|min:9|unique:users,phone',
    ];

    public function render()
    {
        return view('sales::livewire.modal.create-sales-person-modal');
    }

    public function saveClose(){
        $this->validate();

        // Create User
        $user = User::create([
            'team_id' => auth()->user()->team_id,
            'company_id' => current_company()->id,
            'current_company_id' => current_company()->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->name),
        ]);
        $user->save();
        // Create Employee
        if($this->isEmployee){
            Employee::create([
                'company_id' => $user->company_id,
                'user_id' => $user->id,
                'date_of_hire' => now(),
            ]);
        }
        // Create Sales Team Member
        $member = SalesTeamMember::create([
            'company_id' => current_company()->id,
            'sales_team_id' => $this->team->id,
            'user_id' => $user->id
        ]);
        $member->save();
        // Create Sales Person
        $salesperson = SalesPerson::create([
            'company_id' => current_company()->id,
            'user_id' => $user->id,
            'sales_team_id' => $this->team->id,
        ]);
        $salesperson->save();

        $this->dispatch('update-members');

        session()->flash('message', 'Sales Person Created Successfully');
        $this->closeModal();

    }

}