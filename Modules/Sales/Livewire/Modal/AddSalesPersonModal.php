<?php

namespace Modules\Sales\Livewire\Modal;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Mail\Template;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;
use Modules\Contact\Entities\Contact;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Modules\Sales\Entities\SalesTeamMember;

class AddSalesPersonModal extends ModalComponent
{
    use WithPagination;
    public SalesTeam $team;
    public $selectedItem;
    public $ids = [];

    public function mount($team){
        $this->team = $team;
    }

    public function render()
    {
        // Retrieve team members (IDs)
        $teamMemberIds = $this->team->members->pluck('user_id')->toArray();

        // Retrieve non-team users
        $users = User::isCompany(current_company()->id)
            ->whereNotIn('id', $teamMemberIds)
            ->paginate(10);

        return view('sales::livewire.modal.add-sales-person-modal', compact('users'));
    }

    public function addItem($key)
    {
        if (in_array($key, $this->ids)) {
            $this->ids = array_diff($this->ids, [$key]);
        } else {
            $this->ids[] = $key;
            // return dd(count($this->ids));
        }
    }

    // Perform the action
    public function perform(){
        $this->validate([
            'ids' => 'array|min:1',
            // 'ids.*' => 'unique:sales_team_members,user_id',
        ]);

        foreach($this->ids as $id){
            $member = SalesTeamMember::create([
                'company_id' => current_company()->id,
                'sales_team_id' => $this->team->id,
                'user_id' => $id
            ]);
            $member->save();

            $salesperson = SalesPerson::create([
                'company_id' => current_company()->id,
                'user_id' => $id,
                'sales_team_id' => $this->team->id,
            ]);
            $salesperson->save();
        }

        $this->dispatch('update-members');

        $this->closeModal();
    }

}