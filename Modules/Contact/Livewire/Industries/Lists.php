<?php

namespace Modules\Contact\Livewire\Industries;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Industrie;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedTitles = []; //Checkbox select

    public $deleteId = '';

    public $name, $full_name, $industrieId, $updateIndustry = false, $addIndustry = false;


    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required|string|max:60',
        'full_name' => 'nullable|string|max:20'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->name = '';
        $this->full_name = '';
    }

    public function changeView($view){
        $this->view = $view;
    }
    public function render()
    {
        $industries = Industrie::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.industries.lists', compact('industries'))
        ->extends('layouts.master');
    }


    /**
     * Open Add Title form
     * @return void
     */
    public function addIndustry()
    {
        $this->resetFields();
        $this->addIndustry = true;
        $this->updateIndustry = false;
    }

     /**
      * store the user inputted post data in the posts table
      * @return void
      */
      public function storeIndustry()
      {
        //   $this->validate();

          Industrie::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'full_name' => $this->full_name
          ]);

        //   session()->flash('success','Post Created Successfully!!');
          $this->resetFields();
          $this->addIndustry = false;
      }

}
