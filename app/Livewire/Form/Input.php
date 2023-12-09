<?php

namespace App\Livewire\Form;

class Input{

    public string $component = 'inputs.input';
    public string $key;

    public string $label;

    public string $type;

    public string $model;

    public string $position;

    public string $tab;

    public string $group;

    public $placeholder;

    public $help;

    public function __construct($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
    {
        $this->key = $key;
        $this->label = $label;
        $this->type = $type;
        $this->model = $model;
        $this->position = $position;
        $this->tab = $tab;
        $this->group = $group;
        $this->placeholder = $placeholder;
        $this->help = $help;
    }

    public static function make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
    {
        return new static($key, $label, $type, $model, $position, $tab, $group, $placeholder, $help);
    }


    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
