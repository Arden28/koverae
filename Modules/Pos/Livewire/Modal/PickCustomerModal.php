<?php

namespace Modules\Pos\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\Contact\Entities\Contact;

class PickCustomerModal extends ModalComponent
{
    public function render()
    {
        $customers = Contact::isCompany(current_company()->id)->isCustomer()->get();
        return view('pos::livewire.modal.pick-customer-modal', compact('customers', 'customers'));
    }

    public function pick($customer){

        $this->closeModalWithEvents([
            $this->dispatch('pick-customer', customer: $customer)
        ]);
    }
}
