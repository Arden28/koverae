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

    public function tabs() : array{
        return [];
    }

    public function groups() : array{
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
