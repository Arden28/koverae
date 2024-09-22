<?php

namespace Modules\Contact\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class TagFormPanel extends ControlPanel
{
    public $tag;

    public function mount($tag = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($tag){
            $this->tag = $tag;
            $this->currentPage = $tag->name;
        }else{
            $this->currentPage = __('translator::contacts.control.tag.current_page_new');
        }
        $this->new = route('contacts.tags.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
