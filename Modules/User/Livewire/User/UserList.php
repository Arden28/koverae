<?php

namespace Modules\User\Livewire\User;

use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        return view('user::livewire.user.user-list')
        ->extends('layouts.master');
    }
}
