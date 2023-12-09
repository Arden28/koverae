<?php

namespace App\Livewire\Form;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
abstract class BaseForm extends Component
{

    public function render()
    {
        return view('livewire.form.base-form');
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
