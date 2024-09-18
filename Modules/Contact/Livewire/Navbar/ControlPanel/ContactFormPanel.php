<?php

namespace Modules\Contact\Livewire\Navbar\ControlPanel;

use Modules\App\Livewire\Components\Navbar\ControlPanel;
use Modules\App\Livewire\Components\Navbar\Button\ActionButton;

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
            $this->currentPage = __('translator::contacts.control.contact.current_page_new');
        }
        $this->new = route('contacts.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('archive', '<i class="bi bi-inboxes"></i> '.__('translator::contacts.control.contact.actions.archive'), 'printQT()'),
            ActionButton::make('duplicate', __('translator::contacts.control.contact.actions.duplicate'), 'duplicateQT()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> '.__('translator::contacts.control.contact.actions.delete'), 'deleteQT()', true),
            ActionButton::make('send-sms', __('translator::contacts.control.contact.actions.send-sms'), "markAsSent()", false, 'sent'),
            ActionButton::make('download-vcard', __('translator::contacts.control.contact.actions.download-vcard'), ""),
            ActionButton::make('grant-access', __('translator::contacts.control.contact.actions.grant-access'), 'duplicateQT()'),
            // Add more buttons as needed
        ];
    }

}
