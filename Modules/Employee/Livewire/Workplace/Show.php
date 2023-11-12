<?php

namespace Modules\Employee\Livewire\Workplace;

use Livewire\Component;
use Modules\Employee\Entities\Workplace;

class Show extends Component
{
    public $workplace, $title, $icon;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->icon = '';
    }

    public function mount(){

        $this->title = $this->workplace->title;

        $this->icon = $this->workplace->icon;

    }

    // Real-time validation rules
    public function rules()
    {
        return [
            'title' => 'required|string|max:60',
            'icon' => 'nullable',
        ];
    }

    public function render()
    {
        return view('employee::livewire.workplace.show')
        ->layout('layouts.master');
    }

    public function update($workplace){
        $this->validate();
        $workplace = Workplace::find($workplace);

        $workplace->update([
            'title' => $this->title,
            'icon' => $this->icon,
            'company_id' => current_company()->id,
        ]);

        session()->flash('message', 'Lieu de travail mis à jour.');

    }
}
