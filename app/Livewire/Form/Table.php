<?php

namespace App\Livewire\Form;

class Table{

    public string $component = 'tables.simple';

    public string $key;
    public $type;
    public $tab;
    public $group;

    public function __construct($key, $type, $tab = null, $group = null)
    {
        $this->key = $key;
        $this->type = $type;
        $this->tab = $tab;
        $this->group = $group;
    }

    public static function make($key, $type, $tab = null, $group = null)
    {
        return new static($key, $type, $tab, $group);
    }


    public function component($component)
    {
        $this->component = $component;

        return $this;
    }

    public function data()
    {
        // return $this->query()->isCompany(current_company()->id)
        //     ->get();
    }
}
