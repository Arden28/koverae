<?php

namespace App\Livewire\Navbar\Template;

use Livewire\Component;

abstract class Simple extends Component
{
    public $currentPage;
    public $save;

    public function render()
    {
        return view('livewire.navbar.template.simple');
    }

    public function saveUpdate(){
        $this->dispatch('save');
    }

    public function cancelUpdate(){
        $this->dispatch('cancel');
    }
}
