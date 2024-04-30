<?php

namespace App\Livewire\Form;

class Tabs{

    public string $component = 'tabs.tab';

    public string $key;

    public string $label;

    public $condition;

    public function __construct($key, $label, $condition = null)
    {
        $this->key = $key;
        $this->label = $label;
        $this->condition = $condition;
    }

    public static function make($key, $label, $condition = null)
    {
        return new static($key, $label, $condition);
    }


    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
