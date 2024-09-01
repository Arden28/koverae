<?php

namespace App\Livewire;

use App\Models\Module\Module;
use Livewire\Attributes\On;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page')
        ->extends('layouts.main');
    }

    #[On('back-to-home')]
    public function goHome(){
        update_menu(22);
    }

}