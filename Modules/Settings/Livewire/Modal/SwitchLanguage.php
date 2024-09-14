<?php

namespace Modules\Settings\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\App\Entities\Languages\Language;

class SwitchLanguage extends ModalComponent
{
    public $language;

    public function mount(Language $language){
        $this->language = $language;
    }
    public function render()
    {
        return view('settings::livewire.modal.switch-language');
    }
    
    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function translate(){
        $this->closeModal();
    }
}
