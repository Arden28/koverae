<?php

namespace App\Livewire\Settings;

class Block{

    public string $component = 'blocks.simple';

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
