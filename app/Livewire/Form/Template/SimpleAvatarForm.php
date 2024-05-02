<?php

namespace App\Livewire\Form\Template;

use Livewire\Component;

abstract class SimpleAvatarForm extends Component
{
    public bool $checkboxes = false;
    public bool $blocked = false;

    public function render()
    {
        return view('livewire.form.template.simple-avatar-form');
    }

    public function form(){
        return null;
    }

    public function updateForm() {
        return null;
    }

    public function inputs() : array{
        return [];
    }

    public function tabs() : array{
        return [];
    }

    public function groups() : array{
        return [];
    }

    public function tables() : array{
        return [];
    }

    public function columns() : array{
        return [];
    }

    public function actionBarButtons() : array{
        return [];
    }

    public function statusBarButtons(){
        return [];
    }

    public function capsules(){
        return [];
    }
    public  function actionButtons() : array{
        return [];
    }
}
