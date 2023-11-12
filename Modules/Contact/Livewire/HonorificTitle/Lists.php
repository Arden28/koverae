<?php

namespace Modules\Contact\Livewire\HonorificTitle;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\HonorificTitle;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedTitles = []; //Checkbox select

    public $deleteId = '';

    public $title, $abbreviation, $titleId, $updateTitle = false, $addTitle = false;


    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'title' => 'required|string|max:60',
        'abbreviation' => 'nullable|string|max:20'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->title = '';
        $this->abbreviation = '';
    }

    public function changeView($view){
        $this->view = $view;
    }

    public function render()
    {
        $titles = HonorificTitle::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.honorific-title.lists', compact('titles'))
        ->extends('layouts.master');
    }


    /**
     * Open Add Title form
     * @return void
     */
    public function addTitle()
    {
        $this->resetFields();
        $this->addTitle = true;
        $this->updateTitle = false;
    }

     /**
      * store the user inputted post data in the posts table
      * @return void
      */
      public function storeTitle()
      {
          $this->validate();

          HonorificTitle::create([
            'company_id' => current_company()->id,
            'title' => $this->title,
            'abbreviation' => $this->abbreviation
          ]);

        //   session()->flash('success','Post Created Successfully!!');
          $this->resetFields();
          $this->addTitle = false;
      }

    public function destroy(HonorificTitle $title) {
        // abort_if(Gate::denies('delete_titles'), 403);

        $title->delete();

        notify()->success("Le titre a bien été supprimé !', 'warning");

    }
}
