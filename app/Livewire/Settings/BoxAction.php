<?php

namespace App\Livewire\Settings;

class BoxAction
{
    public string $component = 'blocks.boxes.action.simple';
    public string $key;

    public string $box;

    public string $label;

    public string $type;

    public $icon;
    public $action;

    public function __construct($key, $box, $label, $type, $icon = null, $action = null)
    {
        $this->key = $key;
        $this->box = $box;
        $this->label = $label;
        $this->type = $type;
        $this->icon = $icon;
        $this->action = $action;
    }

    public static function make($key, $box, $label, $type, $icon = null, $action = null)
    {
        return new static($key, $box, $label, $type, $icon, $action);
    }

    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}