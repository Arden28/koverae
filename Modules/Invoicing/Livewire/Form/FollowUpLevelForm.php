<?php

namespace Modules\Invoicing\Livewire\Form;

use Modules\App\Livewire\Components\Form\Group;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Form\Tabs;
use Modules\App\Livewire\Components\Form\Template\SimpleForm;

class FollowUpLevelForm extends SimpleForm
{
    public $level;
    public $description;

    public function mount($level = null){
        if($level){
            $this->level = $level;
            $this->description = $level->description;

        }
    }

    public function tabs() : array
    {
        return [
            Tabs::make('general','Reminder'),
            Tabs::make('task','Tasks'),
        ];
    }
    public function inputs() : array
    {
        return [
            Input::make('description', __('Description'), 'text', 'description', 'top-title', 'none', 'none', __('e.g. First Reminder via Email'))->component('form.input.ke-title'),
        ];
    }

}
