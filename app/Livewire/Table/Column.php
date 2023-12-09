<?php

namespace App\Livewire\Table;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Column
{
    public string $component = 'columns.column';

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
