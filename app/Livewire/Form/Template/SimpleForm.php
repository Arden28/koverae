<?php

namespace App\Livewire\Form\Template;

use Livewire\Component;

abstract class SimpleForm extends Component
{
    public function render()
    {
        return view('livewire.form.template.simple-form');
    }

    public function form(){
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

    public function actionBarButtons() : array{
        return [];
    }

    public function statusBarButtons() : array{
        return [];
    }

    public function capsules(){
        return [];
    }

    public function actionButtons() : array{
        return [];
    }
}
