<?php

namespace Modules\Contact\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ContactFormPanel extends ControlPanel
{
    public $contact;

    public function mount($contact = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($contact){
            $this->contact = $contact;
            $this->currentPage = $contact->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('contacts.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
