<?php

namespace App\Livewire\Search;

use Livewire\Component;
use Modules\Inventory\Entities\Product;

class DynamicSearchDropdown extends Component
{
    public $index;
    public $value;
    public $query = '';
    public $model;
    public $searchAttributes = [];
    public $additionalCriteria = [];
    public $event;
    public $searchResults = [];
    public $how_many;
    public bool $showDropdown = true;

    public function mount($model, $searchAttributes = [], $additionalCriteria = [], $event, $value = []) {
        $this->model = $model;
        $this->searchAttributes = $searchAttributes;
        $this->additionalCriteria = $additionalCriteria;
        $this->event = $event;
        $this->value = $value;
        // $this->searchResults = Collection::empty();
    }
    public function render()
    {
        return view('livewire.search.dynamic-search-dropdown');
    }

    public function updatedQuery()
    {
        $className = $this->model;
        $query = $className::query();

        foreach ($this->searchAttributes as $attribute) {
            $query->orWhere($attribute, 'like', '%' . $this->query . '%');
        }

        if($this->additionalCriteria){
            foreach ($this->additionalCriteria as $attribute => $value) {
                $query->where($attribute, $value);
            }
        }

        $this->searchResults = $query->limit(10)->get()->pluck($this->searchAttributes[0])->toArray();
    }

    public function resetQuery() {
        $this->query = '';
        $this->searchResults = [];
        $this->showDropdown = false;
        // $this->how_many = 5;
    }


    public function showDropdown()
    {
        $this->showDropdown = true;
    }

    public function unselect($value)
    {
        $this->showDropdown = false;
    }
    // Select the element
    public function select($value){
        $this->dispatch($this->event, name: $value); //$this->event est l'événement qui doit être enclenché
        $this->resetQuery();
    }
}
