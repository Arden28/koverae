<?php

namespace App\Livewire\Form;

class Capsule{

    public string $component = 'capsules.simple';

    public string $key;

    public string $label;

    public string $help;

    public function __construct($key, $label, $help)
    {
        $this->key = $key;
        $this->label = $label;
        $this->help = $help;
    }

    public static function make($key, $label, $help)
    {
        return new static($key, $label, $help);
    }

    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
