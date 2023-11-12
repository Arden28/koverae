<?php

namespace Modules\Employee\Livewire\Workplace;

use Livewire\Component;
use Modules\Employee\Entities\Workplace;

class Create extends Component
{
    public $title, $icon;

    public function render()
    {
        return view('employee::livewire.workplace.create')
        ->layout('layouts.master');
    }
    public function store(){

        $validatedData = $this->validate([
            'title' => 'required|string|max:40',
            'icon' => 'nullable',
        ]);

        $workplace = Workplace::create([
            'title' => $this->title,
            'icon' => $this->icon,
            'company_id' => current_company()->id,
        ]);

        // Clear form fields after creating the workplace.
        $this->reset(['title', 'icon']);

        session()->flash('message', __('Le lieu de travail a été ajouté !'));

        return redirect()->route('employee.workplaces.index', ['subdomain' => current_company()->domain_name]);
    }

    public function newRecord(){

        $this->reset(['title', 'icon']);
    }
}
