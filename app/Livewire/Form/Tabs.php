<?php

namespace App\Livewire\Form;

class Tabs{

    public string $component = 'tabs.tab';

    public string $key;

    public string $label;

    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    public static function make($key, $label)
    {
        return new static($key, $label);
    }


    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
