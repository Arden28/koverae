<?php

namespace App\Livewire\Settings;

class Box{

    public string $component = 'blocks.boxes.simple';

    public string $key;
    public string $label;
    public string $model;
    public $description;
    public string $block;
    public $help;
    public bool $checkbox;
    public $icon;

    public array $actions;

    public function __construct($key, $label, $model, $description, $block, $checkbox, $help = null, $icon = null, $actions = [])
    {
        $this->key = $key;
        $this->label = $label;
        $this->model = $model;
        $this->description = $description;
        $this->block = $block;
        $this->checkbox = $checkbox;
        $this->help = $help;
        $this->icon = $icon;
        $this->actions = $actions;
    }

    public static function make($key, $label, $model, $description, $block, $checkbox, $help = null, $icon = null, $actions = [])
    {
        return new static($key, $label, $model, $description, $block, $checkbox, $help, $icon, $actions);
    }

    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
