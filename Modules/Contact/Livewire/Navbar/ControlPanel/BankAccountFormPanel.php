<?php

namespace Modules\Contact\Livewire\Navbar\ControlPanel;

use Modules\App\Livewire\Components\Navbar\ControlPanel;
use Modules\App\Livewire\Components\Navbar\Button\ActionButton;

class BankAccountFormPanel extends ControlPanel
{
    public $bank;

    public function mount($bank = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($bank){
            $this->bank = $bank;
            $this->currentPage = $bank->name;
        }else{
            $this->currentPage = __('translator::contacts.control.bank-account.current_page_new');
        }
        $this->new = route('contacts.banks.accounts.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
