<?php

namespace Modules\Settings\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\App\Entities\Languages\Language;

class AddLanguage extends ModalComponent
{
    public $language;

    public function render()
    {
        $languages = Language::isCompany(current_company()->id)->notInstalled()->get();
        return view('settings::livewire.modal.add-language', compact('languages'));
    }
    
    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function addLanguage(Language $language){
        $this->validate([
            'language' => ['required', 'exists:languages,id']
        ]);

        $language = Language::find($this->language)->first();
        $language->update([
            'is_active' => true,
        ]);
        $language->save();
    }
}
