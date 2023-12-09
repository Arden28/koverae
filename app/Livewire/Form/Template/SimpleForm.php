<?php

namespace App\Livewire\Form\Template;

use Livewire\Component;

abstract class SimpleForm extends Component
{
    public function render()
    {
        return view('livewire.form.template.simple-form');
    }

    public abstract function form() : string;

    public abstract function inputs() : array;

    public abstract function tabs() : array;

    public abstract function groups() : array;

    public abstract function actionBarButtons() : array;

    public abstract function statusBarButtons();

    public abstract function capsules();

    public abstract function actionButtons() : array;
}
