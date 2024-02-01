<?php

namespace App\Livewire\Settings;

class Box{

    public string $component = 'blocks.boxes.simple';

    public string $key;
    public string $label;
    public string $model;
    public string $description;
    public string $block;
    public $help;
    public bool $checkbox;

    public function __construct($key, $label, $model, $description, $block, $checkbox, $help = null)
    {
        $this->key = $key;
        $this->label = $label;
        $this->model = $model;
        $this->description = $description;
        $this->block = $block;
        $this->checkbox = $checkbox;
        $this->help = $help;
    }

    public static function make($key, $label, $model, $description, $block, $checkbox, $help = null)
    {
        return new static($key, $label, $model, $description, $block, $checkbox, $help);
    }

    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
