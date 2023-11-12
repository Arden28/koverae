<?php

namespace Modules\Contact\Livewire\Tag;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\ContactTag as Tag;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedContact = []; //Checkbox select

    public $deleteId = '';

    public function changeView($view){
        $this->view = $view;
    }
    public function render()
    {
        $tags =Tag::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.tag.lists', compact('tags'))
        ->extends('layouts.master');
    }
}
