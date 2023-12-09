<?php

namespace Modules\Settings\Livewire\User;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('user::livewire.user.user-list')
        ->extends('layouts.master');
    }
}
