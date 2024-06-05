<?php

namespace Modules\Sales\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeamMember;

class OpenSalesPersonModal extends ModalComponent
{
    public SalesTeamMember $person;
    public $name, $email, $phone;

    protected $rules = [
        'name' => 'required|max:50',
        'email' =>'required|email|max:50',
        'phone' =>'required|min:9',
    ];

    public function mount($person){
        $this->person = $person;
        $this->name = $this->person->user->name;
        $this->email = $this->person->user->email;
        $this->phone = $this->person->user->phone;
    }

    public function render()
    {
        return view('sales::livewire.modal.open-sales-person-modal');
    }

    public function save(){
        $this->validate();

        $user = $this->person->user;

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        $this->dispatch('update-members');
        $this->closeModal();
    }

    public function remove(SalesTeamMember $member){
        $member->delete();

        $this->dispatch('update-members');
        $this->closeModal();
    }
}
